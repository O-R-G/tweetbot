// phantomjs (http://phantomjs.org/) script to render js canvas as png

var page = require('webpage').create();

// final png size
page.viewportSize = 
{ 
	width: 2000, 
	height: 2000
};

page.content = '<html><body><canvas id="clock-canvas"></canvas></body></html>';
page.injectJs('twitter-clock.js');
page.evaluate(function()
{
	init_clock("clock-canvas", "centre", true);
	document.body.style.margin = '0px';
});

setTimeout(function(){page.render('time.png');}, 50);
setTimeout(function(){phantom.exit();}, 75);