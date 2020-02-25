var bannerAtual = -1; 

var banners = [
	{ url: 'http://www.salvador.ba.gov.br/Banner_Rotativo/banner_rotativo/bannersimposio', tempo: 8500 },
	{ url: 'http://www.salvador.ba.gov.br/Banner_Rotativo/banner_rotativo/banner_plano_500_082115', tempo: 16500 },

	{ url: 'http://www.salvador.ba.gov.br/Banner_Rotativo/banner_rotativo/requalificacao_rio_vermelho_versao2.swf', tempo: 11500 }
	
];


var flashvars = {};
var params = {};
var attributes = {};
params.wmode = "opaque";

$(document).ready( function() 
{
	var url = verificarUrlPagina();
	trocarBanner();	

});


function trocarBanner()
{
	bannerAtual++;

	if ( bannerAtual == banners.length ) bannerAtual = 0;

	var banner = banners[bannerAtual];

	swfobject.embedSWF(banner.url, "swf", "728", "90", "9.0.0", "", flashvars, params, attributes);

	setTimeout( trocarBanner, banner.tempo );

}


function verificarUrlPagina()
{
	var url = (window.location != window.parent.location) ? document.referrer : window.location.href;
	url = url.replace( "http://www.www.", "" );
	url = url.replace( "http://www.", "" );
	url = url.replace( /\.salvador\.ba\.gov\.br.*/, "" );
	url = url.replace( ".homologa", "" );	
	return url;
}
