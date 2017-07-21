<?php
/*

  Plugin Name:  PageLines Section Juxtapose
  Description:  A product section for comparing two products or services next to each other with a before/after slider with descriptions and pricing options.

  Author:       PageLines Mod By World Webscapes
  Author URI:   http://www.pagelines.com
  Demo:         true

  Version:      5.0.9

  PageLines:    PL_Juxtapose_Section
  Filter:       component

  Category:     framework, sections, free

  Tags:         images, items

*/

if( ! class_exists('PL_Section') )
  return;

class PL_Juxtapose_Section extends PL_Section {


  function section_persistent(){

    add_filter('pl_binding_' . $this->id, array( $this, 'callback'), 10, 2);

  }

  function section_styles() {


    pl_script( 'jquery-mobile', plugins_url( 'jquery.mobile.custom.min.js', __FILE__ ) );
    pl_script( $this->id, plugins_url( 'script.js', __FILE__ ) );

  }


  function section_opts(){

    $options   = array();
	   $options[] = array(

			'title' => __( 'Juxtapose Main Headline', 'pl-section-juxtapose' ),

			'type' => 'multi',
		   'toggle'  => 'open',
		   

			'opts' => array(

				array(

					'key' => 'headline',

					'type' => 'text',

					'height' => '50px',

					'controls' => false,

					'default' => 'Juxtapose Something',

					'label' => __( 'Main headline.', 'pl-section-juxtapose' ),

				),

				array(

					'key' => 'subtext',

					'label' => __( 'Caption', 'pl-section-juxtapose' ),

					'height' => '100px',

					'type' => 'richtext',

					'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce metus nisi, venenatis nec felis sit amet, luctus facilisis erat.'

				),
		 

			),
		   

		);
	   $options[] = array(
        'title' => __('Juxtapose Images', 'pl-section-juxtapose'),
        'guide' => __('Images must have same width or same aspect ratio to cover section area equally. Default size is 1300x867px', 'pl-section-juxtapose'),
        'toggle'  => 'closed',
        'type'    => 'multi',
        'opts'    => array(
          array(
            'key'     => 'plc_image_before',
            'type'    => 'image_upload',
            'label'   => __( 'Before Image', 'pl-section-juxtapose' ),
            'default' => plugins_url( '/images/image-1.jpg', __FILE__ ),
           
          ),
          array(
            'key'     => 'plc_image_before_text',
            'type'    => 'text',
            'label'   => __( 'Before Text', 'pl-section-juxtapose' ),
            'default' => 'Before',
            
          ),
		   
          array(
            'key'     => 'plc_image_after',
            'type'    => 'image_upload',
            'label'   => __( 'After Image', 'pl-section-juxtapose' ),
            'default' => plugins_url( '/images/image-2.jpg', __FILE__ ),
            
          ),
          array(
            'key'     => 'plc_image_after_text',
            'type'    => 'text',
            'label'   => __( 'After Text', 'pl-section-juxtapose' ),
            'default' => 'After',
            
          ),
		     pl_std_opt('scheme', array(

            'key'     => 'image_scheme',

            'default' => 'pl-scheme-default',

            'label'   => __( 'Image Text Color Scheme', 'pl-section-juxtapose' ),

            

          )),
		   
		   
          pl_std_opt('background_color', array(
            'key'     => 'plc_handle_bg',
            'default' => 'rgba(11, 107, 254, 1)',
            'label'   => __( 'Handle Color', 'pl-section-juxtapose' ),
            
          )),
          pl_std_opt('background_color', array(
            'key'     => 'plc_arrows_color',
            'default' => 'rgba(255, 255, 255, 1)',
            'label'   => __( 'Arrows Color', 'pl-section-juxtapose' ),
           
          )),

        )
    );
	   $options[] = array(

			'title' => __( 'Juxtapose Title And Pricing Configuration', 'pl-section-juxtapose' ),

			'type' => 'multi',
		   'toggle'  => 'closed',

			'opts' => array(

				array(

					'key' => 'title',

					'type' => 'text',

					'height' => '50px',

					'controls' => false,

					'default' => 'Product Or Services Title',

					'label' => __( 'Product headline.', 'pl-section-juxtapose' ),

				),

				array(

					'key' => 'caption',

					'label' => __( 'Caption', 'pl-section-juxtapose' ),

					'height' => '100px',

					'type' => 'richtext',

					'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Non commodo est tincidunt et. Vivamus pretium nulla vel dui suscipit, id lacinia mauris blandit. Sed venenatis eget dui nec gravida. Cras gravida, purus a egestas consequat, nunc enim viverra massa, eu semper quam eros a tellus.'

				),
		   pl_std_opt('background_color', array(

            'key'     => 'caption_background',

            'default' => '#ccc',

            'label'   => 'Description Background Color',

            

          )),

          pl_std_opt('scheme', array(

            'key'     => 'caption_scheme',

            'default' => 'pl-scheme-default',

            'label'   => __( 'Description Color Scheme', 'pl-section-juxtapose' ),

            

          )),
		   array(

         'key'      => 'pre_price',

         'default'    => '$',

         'type'       => 'text',

         'label'     => __( 'Pre-Price', 'pl-section-juxtapose' ),

          ),

			array(

         'key'      => 'price',

         'default'    => '25',

         'type'       => 'text',

         'label'     => __( 'Price', 'pl-section-juxtapose' ),

          ),

			array(

         'key'      => 'post_price',

         'default'    => '00',

         'type'       => 'text',

         'label'     => __( 'Post Price', 'pl-section-juxtapose' ),

          ),

			array(

         'key'      => 'more_price',

         'default'    => 'Additional Information Here',

         'type'       => 'text',

         'label'     => __( 'Addtional Info', 'pl-section-juxtapose' ),

          ),
		   array(

        'title'     => __( 'Button Setup', 'pl-platform' ),

        'type'      => 'multi',

        'stylize'   => 'button-config',

			

        'opts'      => pl_button_link_options( 'button', array( 'button_text' => __( 'Buy Now', 'pl-platform' ), 'button' => '#' ) ),

      ),


			),
		   

		);
	  


   
	     

    return $options;
  }



  function callback( $response, $data ){

    $response['template'] = $this->do_callback( $data['value']);


    return $response;
  }


  /**
   * The section HTML output
   */
  function section_template(){

    ?>
  <div class="pl-show-on-load pl-trigger">
    <div class="pl-row pl-content-area pl-content-area-wide ">      
<div class="pl-row grid-example" style="padding:15px;">
<div class="pl-col-sm-12 pl-col-lg-12" style="padding-bottom: 15px;">
   <div class="wrap">
    <h1 class="pl-alignment-center" data-bind="pltext: headline"></h1>
	<div class="h4 pl-alignment-center" style="padding-left:.5em; padding-right:.5em; padding-bottom:1em;" data-bind="pltext: subtext"></div>
	</div>
	</div>
	<div class="pl-col-sm-5"><div class="wrap" ><figure class="plc-image-container">
       <div data-bind="style: { 'background-color': caption_background }, plclassname: [image_scheme() ],">
        <img src="" data-bind="plimg: plc_image_after, attr: {'alt': plc_image_after_text }" alt="" />
      	<span class="plc-image-label" data-type="original" data-bind="pltext: plc_image_after_text" ></span>
      	<div class="plc-resize-img">
          <img src="" data-bind="plimg: plc_image_before, attr: { 'alt': plc_image_before_text }" alt="" />
      		<span class="plc-image-label" data-type="modified" data-bind="pltext: plc_image_before_text"></span>
      	</div>
		</div>
      	<span class="plc-handle" data-bind="style: { 'background-color': plc_handle_bg }">
          <i class="pl-icon pl-icon-chevron-left" data-bind="style: { 'color': plc_arrows_color }"></i>
          <i class="pl-icon pl-icon-chevron-right" data-bind="style: { 'color': plc_arrows_color }"></i>
        </span>
      </figure>
      </div>
      </div>
      <div class="pl-col-sm-7">
      <div class="wrap">
      <h3 class="" data-bind="pltext: title"></h3>
      <div data-bind="style: { 'background-color': caption_background }, plclassname: [caption_scheme() ],">
	<div class="" data-bind="pltext: caption" style="padding-left:10px; padding-right:10px;">Product Description</div>
      </div>
     <span class="pre_price h4" data-bind="pltext: pre_price">$</span>
			<span class="price h1" data-bind="pltext: price">25</span>
			<span class="post_price h5" data-bind="pltext: post_price">00</span>
			<div class="more_price" data-bind="pltext: more_price">Additional Information Here</div>
    </div>
     <div class="pl-btn-wrap"style="padding-bottom:1em;"><a class="pl-btn" href="#" data-bind="plbtn: 'button'" ></a></div>
    </div>
    
		</div>
    </div>
</div>

    <?php
  }

}
