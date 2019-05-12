/**
 * on change select category
 */
document.querySelector('#nav-products-select select').addEventListener('change', function () {
	var url = this.value;
	window.location = url;
});
