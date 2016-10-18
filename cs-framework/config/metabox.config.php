<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options      = array();

// -----------------------------------------
// Page Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => 'fontpage_meta',
  'title'     => 'Font page Option',
  'post_type' => 'page',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

      array(
      'name'  => 'welcome_text',
      'title' => 'Welcome Text Section',
      'icon'  => 'fa fa-file-word-o',

      // begin: fields
      'fields' => array(

        // begin: a field
        array(
          'id'    => 'welcome_title',
          'type'  => 'textarea',
          'title' => 'Welcome Title',
        ),
        
        array(
          'id'    => 'welcome_text',
          'type'  => 'textarea',
          'title' => 'Welcome Text',
        ),

      ), // end: fields
    ), // end: a section welcome

      array(
      'name'  => 'shortcodes',
      'title' => 'Place Product Categories',
      'icon'  => 'fa fa-sort-amount-asc',

      // begin: fields
      'fields' => array(

       
        array(
          'id'    => 'shortcode_item',
          'type'  => 'switcher',
          'title' => 'Select Show Product Categgory ',
          
        ),

      ), // end: fields
    ), // end: a section welcome


       

    // begin: a section content info
    array(
      'name'  => 'content_list',
      'title' => 'Content List',
      'icon'  => 'fa fa-list-ul',

      // begin: fields
      'fields' => array(

        // begin: a field
        array(
          'id'    => 'content_list_title',
          'type'  => 'text',
          'title' => 'Content List Title',
        ),
        
        array(
          'id'              => 'content_list_info',
          'type'            => 'group',
          'title'           => 'Content list info',
          'button_title'    => 'Add New List Info',
          'accordion_title' => 'Content List Information',
          'fields'          => array(
           array(
                'id'    => 'list_heading',
                'type'  => 'text',
                'title' => 'List Heading',
              ),
            array(
              'id'    => 'list_content',
              'type'  => 'textarea',
              'title' => 'List Content Box',
            ),
           
          ),
        ),


      

      ), // end: fields
    ), // end: a section content list



    array(
      'name'  => 'Hours_of_Operation',
      'title' => 'Hours of Operation',
      'icon'  => 'fa fa-calendar-times-o',

      // begin: fields
      'fields' => array(

        // begin: a field
        array(
          'id'    => 'hour_operation_title',
          'type'  => 'text',
          'title' => 'HOURS OF OPERATION Title',
        ),
        
        array(
          'id'    => 'hour_operation_text',
          'type'  => 'textarea',
          'title' => 'HOURS OF OPERATION Text',
        ),

      ), // end: fields
    ), // end: a HOURS OF OPERATION





    array(
      'name'  => 'Contact_sections',
      'title' => 'Contact sections',
      'icon'  => 'fa fa-phone-square',

      // begin: fields
      'fields' => array(

        array(
          'id'    => 'contact_section_text',
          'type'  => 'textarea',
          'title' => 'Contact Section Text',
        ),

      ), // end: fields
    ), // end: a contact

    // begin: a section
    array(
      'name'  => 'separetor',
      'title' => 'Separetor Line',
      'icon'  => 'fa fa-arrows-h',
      'fields' => array(

        array(
          'id'      => 'separetor_color',
          'type'    => 'color_picker',
          'title'   => 'Select Separetor Color',
          'default' => '#2ecc71',
        ),

       ),
    ),
    // end: a section

  ),
);

CSFramework_Metabox::instance( $options );



