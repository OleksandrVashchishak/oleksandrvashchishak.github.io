// toogle leng block
$(document).ready(function() {
	$('.home__leng').click(function() {
		$('.home__togle-leng,.home__leng-img').toggleClass('active');
	});
});

//toogle boorger menu
$(document).ready(function() {
	$('.menu-toggler').click(function() {
		$('.header__menu-burger').toggleClass('active');
	});
});


$(document).ready(function() {
	$('.menu-toggler').on('click', function() {
		$(this).toggleClass('open');
		$('.top-nav').toggleClass('open');
	});
});

//credits to change
$(document).ready(function() {
	$('.footer__credits-to--click').click(function() {
		$('.footer__hide,.footer__credits-to--click').toggleClass('active');
	});
});


// change 'see less' - 'see more'
function innerTextHide() {
	let showHideText = document.getElementById("innerText");
	if (showHideText.innerHTML === "See less") {
		showHideText.innerHTML = "See more";
	} else {
		showHideText.innerHTML = "See less";
	}
}


//  change border
let windowedButton = document.getElementById('windowedButton');
let bgButton = document.getElementById('bgButton');
let downloadFree = document.getElementById('downloadFree');
let warningText = document.getElementById('warningText');

function innerBgType() {
	if ("windowedButton.style.border ='2px solid #bd30ff'") {
		windowedButton.style.border = '2px solid #FE7DF9';
		bgButton.style.border = '2px solid #bd30ff';
	}
	downloadFree.href = "windowedVersion";
	warningText.style.display = 'flex';
}

function innerWindowedType() {
	if ("bgButton.style.border ='2px solid #bd30ff'") {
		bgButton.style.border = '2px solid #FE7DF9';
		windowedButton.style.border = '2px solid #bd30ff';
	}
	downloadFree.href = "backgroundVersion";
	warningText.style.display = 'none';
}




$(document).ready(function() {
	$('.what-news__more').click(function() {
		$('.see-more-hide, .what-news__see-img').toggleClass('active');
	});
});


//acordion
let $uiAccordion = $('.js-ui-accordion');

$uiAccordion.accordion({
	collapsible: true,
	heightStyle: 'content',
	active: 20,


	activate: function activate(event, ui) {
		let newHeaderId = ui.newHeader.attr('id');

		if (newHeaderId) {
			history.pushState(null, null, '#' + newHeaderId);
		}
	},

	create: function create(event) {
		let $this = $(event.target);
		let $activeAccordion = $(window.location.hash);

		if ($this.find($activeAccordion).length) {
			$this.accordion('option', 'active', $this.find($this.accordion('option', 'header')).index($activeAccordion));
		}
	}
});

$(window).on('hashchange', function() {
	let $activeAccordion = $(window.location.hash);
	let $parentAccordion = $activeAccordion.parents('.js-ui-accordion');

	if ($activeAccordion.length) {
		$parentAccordion.accordion('option', 'active', $parentAccordion.find($uiAccordion.accordion('option', 'header')).index($activeAccordion));
	}
});


// send mail

$(document).ready(function() {

	$("form").submit(function() { //Change
		let th = $(this);
		$.ajax({
			type: "POST",
			url: "mail.php", //Change
			data: th.serialize()
		}).done(function() {
			alert("Thank you!");
			setTimeout(function() {
				// Done Functions
				th.trigger("reset");
			}, 1000);
		});
		return false;
	});

});


// your status toogle select

$(document).ready(function() {
	$('.input-value,.input-status-block').click(function() {
		$('.input-status-block,.input-status').toggleClass('active');
	});
});

// select you status input functions
let designerValue = document.getElementById('designerValue');
let helpOrWorkDesign = document.getElementById('helpOrWorkDesign');
let inputValue = document.getElementById('inputValue');
let helpOrWorkDevelop = document.getElementById('helpOrWorkDevelop');
let helpOrWorkBusines = document.getElementById('helpOrWorkBusines');
designerValue.addEventListener("click", designerV);

function designerV() {
	inputValue.value = designerValue.innerHTML;
	helpOrWorkDesign.style.display = 'flex';
	helpOrWorkDevelop.style.display = 'none';
	helpOrWorkBusines.style.display = 'none';
}
let developerValue = document.getElementById('developerValue');
developerValue.addEventListener("click", developerV);

function developerV() {
	inputValue.value = developerValue.innerHTML;
	helpOrWorkDevelop.style.display = 'flex';
	helpOrWorkBusines.style.display = 'none';
	helpOrWorkDesign.style.display = 'none';
}
let userValue = document.getElementById('userValue');
userValue.addEventListener("click", userV);

function userV() {
	inputValue.value = userValue.innerHTML;
	helpOrWorkBusines.style.display = 'none';
	helpOrWorkDevelop.style.display = 'none';
	helpOrWorkDesign.style.display = 'none';
}
let businesValue = document.getElementById('businesValue');
businesValue.addEventListener("click", businesV);

function businesV() {
	inputValue.value = businesValue.innerHTML;
	helpOrWorkBusines.style.display = 'flex';
	helpOrWorkDevelop.style.display = 'none';
	helpOrWorkDesign.style.display = 'none';
}

let helpSpanDevelop = document.getElementById('helpSpanDevelop');
let helpSpanDesign = document.getElementById('helpSpanDesign');
let helpUs = document.getElementById('helpUs');
let body = document.getElementsByTagName('body');

helpSpanDevelop.addEventListener("click", getHelpPopap);
helpSpanDesign.addEventListener("click", getHelpPopap);

function getHelpPopap() {
	helpUs.style.display = 'block';
	body.style.overflow = "hidden";
}
let workWhichDevelop = document.getElementById('workWhichDevelop');
let workWhichDesign = document.getElementById('workWhichDesign');
let workSpanDevelop = document.getElementById('workSpanDevelop');
let workSpanDesign = document.getElementById('workSpanDesign');
let coloboratePopap = document.getElementById('coloboratePopap');
coloboratePopap.addEventListener("click", getColoboratePopap);
workSpanDevelop.addEventListener("click", getWorkPopapDevelop);
workSpanDesign.addEventListener("click", getWorkPopapDesign);

function getWorkPopapDevelop() {
	workWhichDevelop.style.display = 'block';
	body.style.overflow = "hidden";
}

function getWorkPopapDesign() {
	workWhichDesign.style.display = 'block';
	body.style.overflow = "hidden";
}
let coloborateBusines = document.getElementById('coloborateBusines');

function getColoboratePopap() {
	coloborateBusines.style.display = 'block';
	body.style.overflow = "hidden";
}

let helpUsBut = document.getElementById('helpUsBut');
let workWhichDesignBut = document.getElementById('workWhichDesignBut');
let workWhichDevelopBut = document.getElementById('workWhichDevelopBut');
let coloborateBusinesBut = document.getElementById('coloborateBusinesBut');
let helpFormPopap = document.getElementById('helpFormPopap');
let workPopForm = document.getElementById('workPopForm');
let coloborateFormPopap = document.getElementById('coloborateFormPopap');
helpUsBut.addEventListener("click", getHelpUsForm);
workWhichDesignBut.addEventListener("click", getWorkWhichDesignForm);
workWhichDevelopBut.addEventListener("click", getWorkWhichDevelopForm);
coloborateBusinesBut.addEventListener("click", getColoborateBusinesForm);

function getHelpUsForm() {
	helpUs.style.display = 'none';
	body.style.overflow = "hidden";
	helpFormPopap.style.display = 'block';
}

function getWorkWhichDesignForm() {
	workPopForm.style.display = 'block';
	workWhichDesign.style.display = 'none';
	body.style.overflow = "hidden";
}

function getWorkWhichDevelopForm() {
	workPopForm.style.display = 'block';
	workWhichDevelop.style.display = 'none';
	body.style.overflow = "hidden";

}

function getColoborateBusinesForm() {
	coloborateBusines.style.display = 'none';
	coloborateFormPopap.style.display = 'block';
	body.style.overflow = "hidden";
}

let formButtWork = document.getElementById('formButtWork');
let helpPopButt = document.getElementById('helpPopButt');
let colorboratePopButt = document.getElementById('colorboratePopButt');
let thankPopap = document.getElementById('thankPopap');

formButtWork.addEventListener("click", getThankPopap);
helpPopButt.addEventListener("click", getThankPopap);
colorboratePopButt.addEventListener("click", getThankPopap);

function getThankPopap() {
	coloborateFormPopap.style.display = 'none';
	helpFormPopap.style.display = 'none';
	workPopForm.style.display = 'none';
	thankPopap.style.display = 'block';
	body.style.overflow = "hidden";
}

let buttClosePopap = document.getElementById('buttClosePopap');

buttClosePopap.addEventListener("click", getClosePopap);

function getClosePopap() {
	thankPopap.style.display = 'none';
	body.style.overflowY = "scroll";
}


//foonction copy link

function copyTextToClipboard(text) {
	let textArea = document.createElement("textarea");
	textArea.style.position = 'fixed';
	textArea.style.top = 0;
	textArea.style.left = 0;
	textArea.style.width = '2em';
	textArea.style.height = '2em';
	textArea.style.padding = 0;
	textArea.style.border = 'none';
	textArea.style.outline = 'none';
	textArea.style.boxShadow = 'none';
	textArea.style.background = 'transparent';
	textArea.value = text;
	document.body.appendChild(textArea);
	textArea.select();

	try {
		let successful = document.execCommand('copy');
		let msg = successful ? 'successful' : 'unsuccessful';
		console.log('Copying text command was ' + msg);
	} catch (err) {
		console.log('Oops, unable to copy');
	}

	document.body.removeChild(textArea);
}

function CopyLink() {
	copyTextToClipboard(location.href);
}


// hide header scroll
let leng = $('.home__leng');
let header = $('.header'),
	scrollPrev = 0;

$(window).scroll(function() {
	let scrolled = $(window).scrollTop();

	if (scrolled > 100 && scrolled > scrollPrev) {
		header.addClass('out');
		leng.addClass('out');
	} else {
		header.removeClass('out');
		leng.removeClass('out');
	}
	scrollPrev = scrolled;
});