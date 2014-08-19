/**
 * Plugin Name: App it Up!
 * Plugin URI: http://vallgroup.com/App-it-up.php
 * Description: Turn your Wordpress site into an iPhone/iPad App! When a user saves your site to their device's home screen your site immediately looks and behaves like a native app.
 * Version: 1.0
 * Author: Vallroup LLC
 * Author URI: http://vallgroup.com
 * License: GPL2
 */
 
jQuery(function($){

    vg_set_form_fields();

    var custom_uploader;
    //upload A File
    $('.tp-upload-file').click(function(e) {	
        e.preventDefault();
        $('.file-url').removeClass('insert-img');
        $(this).siblings('.file-url').addClass('insert-img');
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose File',
            button: {
                text: 'Insert File'
            },
            multiple: false
        });
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.insert-img').val(attachment.url);
            vg_file_preview($('.insert-img'), attachment.url);
        });
        //Open the uploader dialog
        custom_uploader.open();
        
    });

    //remove File
    $('.tp-remove-file').click(function(e){
    	e.preventDefault();
    	$(this).siblings('.file-url').attr('value', '');
        vg_remove_file_preview($(this)); 
    	return false;
    });

    var $count = false;
    $('.select-option a').click(function(){
        var ul = $(this).closest('ul.select-options'),
            li = $(this).closest('ul.select-options').children('.select-option'),
            a = $('.select-option a');

        if($count === false){
            li.show('fast');
            $count = true;
            return false;
        }
        if($count === true){
            var sel = $(this).attr('data-selection');
            $(this).closest('ul.select-options').siblings('select').val(sel);

            li.removeClass('active');
            $(this).parent('.select-option').addClass('active');

            li.each(function(){
                if(!$(this).is('.active')){
                    $(this).hide('fast');
                }
                else{
                    $(this).show();
                }
            });

            li.removeClass('select-mode');

            $count = false;

            return false;            
        }
        
        return false;
    });

    $('.vg-toggle-element').change(function(){
        var a = $(this).attr('data-toggle');
        $(a).slideToggle('fast');
    });


function vg_set_form_fields() {
    $('.file-url').each(function(){
        var val = $(this).val();
        if( val !== '' ) {
            vg_file_preview($(this), val);
        }
        else{
            $(this).parent('.file').addClass('empty');   
        }
    });

    $('.field .select select').each(function(){
        $(this).css('display', 'none');

        $(this).parent('.select').append('<ul class="select-options"></ul>');

        $('.field .select option').each(function(){
            var a = $(this).attr('value'),
                b = $(this).attr('selected'),
                c = $(this).text();
                
            if('selected' == b){
                b = 'active';
            }
            else{
                b = '';
            }

            $(this).parent('select').siblings('.select-options').append( '<li class="select-option '+b+'"><a href="javascript:;" data-selection="'+a+'" class="block">'+c+'</a></li>' );
        });
    });    
}

function vg_update_select_fields() {
    var ul = $(this).closest('ul.select-options'),
            li = $(this).closest('ul.select-options').children('.select-option'),
            a = $('.select-option a');

        if($count === false){
            li.show('fast');
            $count = true;
            return false;
        }
        if($count === true){
            var sel = $(this).attr('data-selection');
            $(this).closest('ul.select-options').siblings('select').val(sel);

            li.removeClass('active');
            $(this).parent('.select-option').addClass('active');

            li.each(function(){
                if(!$(this).is('.active')){
                    $(this).hide('fast');
                }
                else{
                    $(this).show();
                }
            });

            li.removeClass('select-mode');

            $count = false;

            return false;            
        }
        
        return false;
}

function vg_file_preview(element, file) {
    element.siblings('.file-preview').css({
        'background': 'url('+file+') no-repeat center center',
        'background-size': 'contain'
    });
    element.parent('.file').removeClass('empty');
}

function vg_remove_file_preview(element) {
    element.parent('.file').addClass('empty');
    element.siblings('.file-preview').css({
        'background': '',
        'background-size': ''
    });
}

});