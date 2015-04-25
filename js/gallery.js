


(function() {



	var defaults = {
		dialogID: 'galleryModal',
		dialogClass: 'modal',
		galleryItems: '.gallery a',
		hideClass: 'hide',
		bodyClass: 'stopscroll'
	};



	var getModal = function() {
		return document.querySelector('#'+defaults.dialogID);
	};



	var modalExists = function() {
		return getModal() !== null;
	};



	var createModal = function() {
		var modal = document.createElement('div');
		modal.id = defaults.dialogID;
		modal.className = defaults.dialogClass;

		modal.appendChild(document.createElement('img'));

		document.body.appendChild(modal);
	};



	var createShowModal = function( _image ) {
		if ( !modalExists() ) {
			createModal();
			closeEvent();
		}

		document.querySelector('#galleryModal img').src = _image;
		showModal();

	};



	var showModal = function() {
		getModal().classList.remove(defaults.hideClass);
		document.querySelector('body').classList.add(defaults.bodyClass);
	};



	var hideModal = function() {
		getModal().classList.add(defaults.hideClass);
		document.querySelector('body').classList.remove(defaults.bodyClass);
	};



	var showImage = function( _event ) {
		_event.preventDefault();
		createShowModal(this.href);
	};



	var eventBindings = function( _elements ) {
		for ( var i=0; i<_elements.length; i++ ) {
			_elements[i].addEventListener( 'click', showImage, false );
		}
	};



	var closeEvent = function() {
		getModal().addEventListener( 'click', hideModal, false );
	};



	this.Gallery = function() {
		var galleryItems = document.querySelectorAll(defaults.galleryItems);

		eventBindings(galleryItems);
	};



	// Run this function straight away
	Gallery()



})();
