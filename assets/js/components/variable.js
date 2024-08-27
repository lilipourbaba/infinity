const rootEl = document.querySelector(':root');
const containerEL = document.querySelector('.container');
const headerEl = document.querySelector('header');
const footerEl = document.querySelector('footer');
let headerHeight, marginFromSide, footerHeight;

export const makeKebab = (str) =>
	str.replace(
		/[A-Z]+(?![a-z])|[A-Z]/g,
		($, ofs) => (ofs ? '-' : '') + $.toLowerCase()
	);

export const setCssVariable = (value, name, parent = rootEl, prefix = 'px') => {
	const kebabName = makeKebab(name);
	parent.style.setProperty(`--${kebabName}`, value + prefix);
};

export const setCssVariableGroup = () => {
	headerHeight = headerEl.getClientRects()[0].height;
	if (footerEl) {
		footerHeight = footerEl.getClientRects()[0].height;
	} else {
		footerHeight = 0;
	}

	const containerWidth = containerEL.clientWidth;
	marginFromSide = (window.innerWidth - containerWidth) / 2;

	setCssVariable(headerHeight, 'headerHeight');
	setCssVariable(marginFromSide, 'marginFromSide');
	setCssVariable(footerHeight, 'footerHeight');
};

//Global Vars
window.addEventListener('load', setCssVariableGroup);
window.addEventListener('resize', setCssVariableGroup);

//Services Home Page Vars

export { headerHeight, marginFromSide, footerHeight };
