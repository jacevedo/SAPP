/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-checkmark-circle' : '&#xe000;',
			'icon-arrow-down' : '&#xe001;',
			'icon-arrow-right' : '&#xe002;',
			'icon-paragraph-justify' : '&#xe003;',
			'icon-mail' : '&#xe004;',
			'icon-menu' : '&#xe005;',
			'icon-tree' : '&#xe006;',
			'icon-address-book' : '&#xe007;',
			'icon-clock' : '&#xe008;',
			'icon-plus' : '&#xe009;',
			'icon-minus' : '&#xe00a;',
			'icon-pencil' : '&#xe00b;',
			'icon-pencil-2' : '&#xe00c;',
			'icon-quill' : '&#xe00d;',
			'icon-pen' : '&#xe00e;',
			'icon-blog' : '&#xe00f;',
			'icon-library' : '&#xe010;',
			'icon-books' : '&#xe011;',
			'icon-book' : '&#xe012;',
			'icon-profile' : '&#xe013;',
			'icon-file' : '&#xe014;',
			'icon-folder-open' : '&#xe015;',
			'icon-stack' : '&#xe016;',
			'icon-paste' : '&#xe017;',
			'icon-coin' : '&#xe018;',
			'icon-location' : '&#xe019;',
			'icon-envelop' : '&#xe01a;',
			'icon-bubbles' : '&#xe01b;',
			'icon-user' : '&#xe01c;',
			'icon-users' : '&#xe01d;',
			'icon-bubbles-2' : '&#xe01e;',
			'icon-bubbles-3' : '&#xe01f;',
			'icon-bubbles-4' : '&#xe020;',
			'icon-bubble' : '&#xe021;',
			'icon-user-2' : '&#xe022;',
			'icon-users-2' : '&#xe023;',
			'icon-user-3' : '&#xe024;',
			'icon-user-4' : '&#xe025;',
			'icon-lock' : '&#xe026;',
			'icon-lock-2' : '&#xe027;',
			'icon-key' : '&#xe028;',
			'icon-key-2' : '&#xe02a;',
			'icon-busy' : '&#xe029;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};