<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
    'image'            => array(
        'type'  => 'upload',
        'label' => esc_html__( 'Choose Image', 'pet-space' ),
        'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'pet-space' )
    ),
    'overlay'      => array(
        'type'         => 'switch',
        'label'        => esc_html__( 'Add overlay on image', 'pet-space' ),
        'value' => 'false',
        'right-choice' => array(
            'value' => 'true',
            'label' => esc_html__( 'Yes', 'pet-space' ),
        ),
        'left-choice'  => array(
            'value' => 'false',
            'label' => esc_html__( 'No', 'pet-space' ),
        ),
    ),
    'size'             => array(
        'type'    => 'group',
        'options' => array(
            'width'  => array(
                'type'  => 'text',
                'label' => esc_html__( 'Width', 'pet-space' ),
                'desc'  => esc_html__( 'Set image width', 'pet-space' ),
                'value' => ''
            ),
            'height' => array(
                'type'  => 'text',
                'label' => esc_html__( 'Height', 'pet-space' ),
                'desc'  => esc_html__( 'Set image height', 'pet-space' ),
                'value' => ''
            )
        )
    ),
    'image-link-group' => array(
        'type'    => 'group',
        'options' => array(
            'title'  => array(
                'label' => esc_html__( 'Text', 'pet-space' ),
                'type'  => 'text',
                'value' => ''
            ),
            'link'   => array(
                'type'  => 'text',
                'label' => esc_html__( 'Image Link', 'pet-space' ),
                'desc'  => esc_html__( 'Where should your image link to?', 'pet-space' )
            ),
            'target' => array(
                'type'         => 'switch',
                'label'        => esc_html__( 'Open Link in New Window', 'pet-space' ),
                'desc'         => esc_html__( 'Select here if you want to open the linked page in a new window', 'pet-space' ),
                'right-choice' => array(
                    'value' => '_blank',
                    'label' => esc_html__( 'Yes', 'pet-space' ),
                ),
                'left-choice'  => array(
                    'value' => '_self',
                    'label' => esc_html__( 'No', 'pet-space' ),
                ),
            ),
        )
    ),
);