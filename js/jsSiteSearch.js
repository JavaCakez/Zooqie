function GetSiteSearchResults(newWindow,frameObject,frameObjectName,fontFace,fontSize,fontColour,linkFace,linkSize,linkColour,resultsText)
{
var sTerms="";
var iDepth = 0;
var sURL = new String(window.location.href);
if (sURL.indexOf("?") > 0)
{
var arrParams = sURL.split("?");
var arrURLParams = arrParams[1].split("&");
for (var i=0;i<arrURLParams.length;i++)
{
var sParam = arrURLParams[i].split("=");
var sValue = decodeURIComponent(sParam[1]);
if( decodeURIComponent(sParam[0]) == frameObjectName)
	sTerms = sValue;
if( decodeURIComponent(sParam[0]) == "depth")
	iDepth = parseInt(sValue);
}
}
var d=frameObject.document;
if (sTerms=="") {d.open(); d.write("<html><head></head><body style=\"background: transparent;\"></body></html>"); d.close();return;}
var sBack=""; for (i=0; i<iDepth; i++) sBack+='..\\\\';
d.open();
d.write("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">");
d.write("<html lang=\"en\">");
d.write("<head>");
d.write("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">");
d.write("</head>");
d.write("<body style=\"margin: 0px 0px 0px 0px; font-family: "+fontFace+"; font-size: "+fontSize+"; color: "+fontColour+"; background: transparent;\">");
d.write("<div id=\"wpSearchResults\"></div>");
d.write("<script type=\"text/javascript\">");
d.write("var wordMap = new Array(\" brand? started with featured brands lillies alley wilderness street apparel bungo clothing shop women brand \",\" search results \",\" site \",\" sell zookie want help independent clothing brands started selling quickly well clothes sell brand's individuality personality they make name themselves shop previously could hard find these under roof shop their unique wares share brings customers together share amongst because have whole bunch friends we've weve always loved uniqueness labels we've weve seen first hand difficulties getting going there this inspired create people like love little message from authors \",\" privacy policy cookies \",\" contact question just want leave comment? drop line email time we'll well reply soon customer email info zookie brands newbrands exeter 07885489062 london 07786808064 details \",\" frequently asked questions \",\" reasons your brand should join zookie you're youre interested getting your brand feel free send email we'll well back soon email newbrands zookie exeter 07885489062 london 07786808064 contact details creating independent clothing awesome struggle make name yourself we're were here help online marketplace that provides with everything need kick-start create store personalise fill range selling instantly hassle simple about bringing people together giving much attention possible with every joins more turning their continually growing audience sell whilst busy there will letting know great style identity makes totally individual sure continue express brand's brands character personality we've weve made stores customisable absolutely unique stays true click take look some have already created starting should risk that's thats won't wont charge penny sign monthly small percentage each sale that always able profit without worries helping grow store make name yourself shop sell instantly nothing \",\" terms conditions \",\" payment failed your payment unsuccessful please ensure entered your information correctly again problems persist please feel free contact \",\" brands username brand name password \",\" payment successful your payment been successful will receive email from paypal shortly confirming please check individual brand delivery times there problems please feel free contact \",\" brand question \",\" create sizing guides edit products custom shipping prices upload store images update brand information info faqs frequently asked questions \",\" shop brand sort \",\" when changing something headers footers don't dont forget change address lookbooks serif \",\" zookie currently undergoing site maintenance we'll well back very soon \",\" returns disputes brand contact details \",\" shop tees hoodies jumpers jackets \",\" shop tees jewellery vests dresses hats \",\" zookie first impressions shannon darko 12th october 2013 runs awesome little blog were lucky enough feature what thinks about will running monthly features favourite brands look these future http shannondarko blogspot zookie-first-impressions html blog latest posts exepose kitty howie lifestyle editor university exeter student newspaper interviewed recently launched website lovely image wearing donated izes clothing page issuu exepose docs week_2 takes style storm 27th september online journalist website caught with cover very newly sophie ritchie fashion picked items discussed uniqueness offered exeter zookie-takes-exeter-style-by-storm brands talks 31st lily houghton campus talk find we're they number competitions coming weeks chance clothing from some hercampus school exeter-brands-hcx-talks-zookieorguk picks month november shannon's shannons first picks site zookie-picks-of-month-1 zookie's zookies steps post 18th nearly months it's been hell journey this only beginning looking fresh showcasing month \",\" \",\" zookie blog post zookie's zookies first steps november 2013 launched september 18th nearly months it's been hell journey this only beginning undergone lots changes improvements since launch including addition blog first post thought would good idea reflect last couple what's whats happened website company come this seems like long time facts figures date from brands over site hits sales worth gone since non-stop response continues staggering well above expectations there have number such improved checkout lookbooks course many we've weve also received surprising amount help support we've weve media attention from exeter exepose student newspaper bloggers more sponsor university mountain bike team what's whats next? we're were incredibly happy with done ever grateful intention stopping here next project introduction pop-up shops universities around country will running weekly where selling promoting their clothing other hand heads asia break whilst spreading some love izes timeless clothing crook dagger maybe even finding international along looks expand route through \");");
d.write("var pageMap = new Array(\"ZOOQIE | Shop men & women's clothing from independent brands\",\"Search Results | ZOOQIE\",\"Site Map | ZOOQIE\",\"About Us | Who we are and what we're about | ZOOQIE\",\"Privacy Policy & Cookies | Privacy information for Zookie customers | ZOOQIE\",\"Contact | Get in contact with us | ZOOQIE\",\"Frequently Asked Questions | ZOOQIE\",\"New Brands | ZOOQIE\",\"Terms and Conditions | The terms and conditions for using Zookie\",\"Failed Payment | ZOOQIE\",\"Brands Log In | ZOOQIE\",\"Successful Payment | ZOOQIE\",\"Ask Brand a Question | ZOOQIE\",\"Brand Upload Tool | ZOOQIE\",\"Brands | New up and coming independent brands from around the UK | ZOOQIE\",\"Master Page | ZOOQIE\",\"ZOOQIE | Site maintenance\",\"Returns | Information on the Zookie returns policy | ZOOQIE\",\"Men | Shop men's clothes, tees, hoodies, jackets & more | ZOOQIE\",\"Women | Shop women's clothes, dresses, jewellery, tees & more | ZOOQIE\",\"Blog | ZOOQIE\",\"Checkout | ZOOQIE\",\"First Steps | ZOOQIE\");");
d.write("var linkMap = new Array(\"index.html\",\"search-results.html\",\"sitemap.html\",\"about.html\",\"privacy.html\",\"contact.html\",\"faqs.html\",\"newbrands.php\",\"terms.html\",\"paymentfail.html\",\"login.html\",\"paymentsuccess.php\",\"brandquestion.php\",\"uploadmenu.php\",\"/brands\",\"masterpage.php\",\"maintenance.html\",\"returns.php\",\"index.php\",\"index.php\",\"blog/index.html\",\"address.php\",\".html\");");
d.write("var preMap = new Array(\"Are you a brand? Get started with us   FEATURED BRANDS LILLIES OF THE ALLEY WTF WILDERNESS STREET APPAREL BUNGO CLOTHING SHOP MEN SHOP WOMEN SHOP BY BRAND \",\"Search Results \",\"Site Map \",\"Sell At Zookie  we want to help independent clothing brands get started and selling quickly   As well as clothes  we want to sell the brand's individuality and personality  so they can make a name for\",\"Privacy Policy   Cookies \",\"Contact Us Got a question or just want to leave us a comment? Drop us a line via email any time and we'll reply as soon as we can  Customer Email  info zookie org uk Brands Email  newbrands zookie org\",\"Frequently Asked Questions \",\"4 Reasons Why Your Brand Should Join Zookie If you're interested in getting your brand on Zookie  feel free to send us an email and we'll get back to you as soon as we can  Email  newbrands zookie org\",\"Terms and Conditions \",\"Payment Failed Your payment was unsuccessful  Please ensure you entered all your information correctly and try again  If problems persist  please feel free to contact us  \",\"Brands Log In Username or Brand Name Password \",\"Payment Successful  Your payment has been successful  You will receive and email from Paypal shortly confirming the payment  Please check the individual brand for delivery times  If there are any prob\",\"Ask Brand a Question \",\"Create Sizing Guides Add or Edit Products Set Custom Shipping Prices Upload Store Images Update Brand Information Products Store Images Brand Info Sizing Guides Shipping Prices FAQs Frequently Asked Q\",\"Shop By Brand Sort by  \",\"When changing something in headers footers  don't forget to change address php and lookbooks php  not in Serif  \",\"Zookie is currently undergoing site maintenance   We'll be back very soon  \",\"Returns and Disputes Brand Contact Details \",\"SHOP TEES Men    SHOP HOODIES AND JUMPERS SHOP JACKETS \",\"   SHOP TEES    SHOP JEWELLERY SHOP VESTS SHOP DRESSES SHOP HATS \",\"Zookie First Impressions by Shannon Darko 12th October 2013 Shannon runs an awesome little blog and we were lucky enough for her to do a little feature on what she thinks about Zookie  Shannon will be\",\"\",\"    Zookie Blog Post Zookie's First Steps 7th November 2013 Zookie launched on September 18th  nearly 2 months ago - it's been a hell of a journey so far  but this is only the beginning  Zookie has un\");");
d.write("function doNav(ind)");
d.write("{");
if (newWindow)
d.write("		 window.open(\""+sBack+"\"+linkMap[ind],\"_blank\");");
else
d.write("		 parent.window.location.href=linkMap[ind];");
d.write("}");
d.write("function wpDoSearch(searchTerms){");
d.write("var terms = searchTerms.split(\" \");");
d.write("if (terms==\"\") return;");
d.write("var results = \"\";");
d.write("var resultscount = 0;");
d.write("for (var i=0; i<wordMap.length; i++)");
d.write("{");
d.write("			var found=true;");
d.write("			for (var j=0; j<terms.length; j++)");
d.write("					if (wordMap[i].indexOf(terms[j].toLowerCase())==-1) found=false;");
d.write("			if (found)");
d.write("			{");
d.write("				 results+=\"<a style=\\\"cursor: pointer; font-family: "+linkFace+"; font-size: "+linkSize+"; color: "+linkColour+"; \\\" onclick=\\\"doNav(\"+i+\");\\\"><u>\"+pageMap[i]+\"</u></a><br>\"+preMap[i]+\"...<br><br>\";");
d.write("				 resultscount++;");
d.write("			}");
d.write("}");
d.write("document.getElementById(\"wpSearchResults\").innerHTML=resultscount+\" "+resultsText+" \"+searchTerms+\"<br><br>\"+results;");
d.write("}");
while(sTerms.indexOf("\"") != -1 ) {
sTerms = sTerms.replace("\"","");
};
d.write("wpDoSearch(\""+sTerms+"\");");
d.write("</script>");
d.write("</body></html>");
d.close();
}