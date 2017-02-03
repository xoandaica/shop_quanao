/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

    config.enterMode = CKEDITOR.ENTER_BR;
	config.filebrowserBrowseUrl = 'http://santhuonghieu.vn/demo_nuhoangquanjean/assets/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = 'http://santhuonghieu.vn/demo_nuhoangquanjean/assets/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = 'http://santhuonghieu.vn/demo_nuhoangquanjean/assets/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl = 'http://santhuonghieu.vn/demo_nuhoangquanjean/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = 'http://santhuonghieu.vn/demo_nuhoangquanjean/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = 'http://santhuonghieu.vn/demo_nuhoangquanjean/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
