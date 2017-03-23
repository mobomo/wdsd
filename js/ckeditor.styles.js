/*
 * This file is used/requested by the 'Styles' button.
 * Bear in mind webkit browsers can be slow to refresh these options.
 */
if(typeof(CKEDITOR) !== 'undefined') {
    CKEDITOR.addStylesSet( 'drupal',
    [
            /* Default Styles */
            
            { name : 'Paragraph'		, element : 'p' },
            { name : 'Heading 2'		, element : 'h2' },
            { name : 'Heading 3'		, element : 'h3' },
            { name : 'Heading 4'		, element : 'h4' },

            /* Example Styles */
            /*
            { name : 'Paragraph with class', element : 'p', attributes : { 'class' : 'yourClass' }},
            { name : 'Strong'			, element : 'strong', overrides : 'b' },
            { name : 'Emphasis'			, element : 'em'	, overrides : 'i' },
            { name : 'Underline'		, element : 'u' },
            { name : 'Strikethrough'	, element : 'strike' },
            { name : 'Subscript'		, element : 'sub' },
            { name : 'Superscript'		, element : 'sup' },
            */

            /* Object Styles */
            /*
            {
                    name : 'Image on Left',
                    element : 'img',
                    attributes :
                    {
                            'style' : 'padding: 5px; margin-right: 5px',
                            'border' : '2',
                            'align' : 'left'
                    }
            },

            {
                    name : 'Image on Right',
                    element : 'img',
                    attributes :
                    {
                            'style' : 'padding: 5px; margin-left: 5px',
                            'border' : '2',
                            'align' : 'right'
                    }
            }
            */
    ]);
}