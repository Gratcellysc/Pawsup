<?php

// share buttons
if ( ! function_exists( 'pet_space_share_this' ) ) :
    /**
     * Share article through social networks.
     * bool $only_buttons
     */
    function pet_space_share_this( $only_buttons = false ) {
        if ( function_exists( 'mwt_share_this' ) ) {
            mwt_share_this( $only_buttons );
        }
    } //pet_space_share_this()
endif; //function_exists