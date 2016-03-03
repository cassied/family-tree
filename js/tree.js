$( document ).ready( function(){
    setMaxWidth();
    $( window ).bind( "resize", setMaxWidth );
    $( "div.tree" ).scrollLeft( 1950 );

    function setMaxWidth() {
    $( ".tree" ).css( "maxWidth", ( $( window ).width() - 8 | 0 ) + "px" );
    }

});