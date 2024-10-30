var url2 = "http://www.hoko.ir/priceDropProductsTable?lc="
                + jQuery("#lc2").val() + "&pc=" + jQuery("#pc2").val() + "&hbc=" + jQuery("#hbc2").val() + "&htc="
                + jQuery("#htc2").val() + "&thbc=" + jQuery("#thbc2").val() + "&thtc=" + jQuery("#thtc2").val()
                + "&orc=" + jQuery("#orc2").val() + "&erc=" + jQuery("#erc2").val() + "&w=" + jQuery("#w2").val()
                + "&num=" + jQuery("#num2").val();
var url1 = "http:\/\/www.hoko.ir\/newProductsTable?lc="
                + jQuery("#lc").val() + "&pc=" + jQuery("#pc").val() + "&hbc=" + jQuery("#hbc").val() + "&htc="
                + jQuery("#htc").val() + "&thbc=" + jQuery("#thbc").val() + "&thtc=" + jQuery("#thtc").val()
                + "&orc=" + jQuery("#orc").val() + "&erc=" + jQuery("#erc").val() + "&w=" + jQuery("#w").val()
                + "&num=" + jQuery("#num").val();
	jQuery("#res").html('<object data="'+url1+'"/>');
	jQuery("#shortcode1").text('[hokoir-new lc="'+ jQuery("#lc").val() +'" pc="'+ jQuery("#pc").val() +'" hbc="'+ jQuery("#hbc").val() +'" htc="'+ jQuery("#htc").val() +'" thbc="'+ jQuery("#thbc").val() +'" thtc="'+ jQuery("#thtc").val() +'" orc="'+ jQuery("#orc").val() +'" erc="'+ jQuery("#erc").val() +'" w="'+ jQuery("#w").val() +'" num="'+ jQuery("#num").val() +'" /]');
	jQuery("#preview").attr("href", url1);
        jQuery("#gen").click(function (e) {
		e.preventDefault();
		jQuery("#shortcode1").text('[hokoir-new lc="'+ jQuery("#lc").val() +'" pc="'+ jQuery("#pc").val() +'" hbc="'+ jQuery("#hbc").val() +'" htc="'+ jQuery("#htc").val() +'" thbc="'+ jQuery("#thbc").val() +'" thtc="'+ jQuery("#thtc").val() +'" orc="'+ jQuery("#orc").val() +'" erc="'+ jQuery("#erc").val() +'" w="'+ jQuery("#w").val() +'" num="'+ jQuery("#num").val() +'" /]');
		var url1 = "http:\/\/www.hoko.ir\/newProductsTable?lc="
                + jQuery("#lc").val() + "&pc=" + jQuery("#pc").val() + "&hbc=" + jQuery("#hbc").val() + "&htc="
                + jQuery("#htc").val() + "&thbc=" + jQuery("#thbc").val() + "&thtc=" + jQuery("#thtc").val()
                + "&orc=" + jQuery("#orc").val() + "&erc=" + jQuery("#erc").val() + "&w=" + jQuery("#w").val()
                + "&num=" + jQuery("#num").val();
			jQuery("#res").html('<object data="'+url1+'"/>');
			jQuery("#preview2").attr("href", url1);
        });
		jQuery("#shortcode2").text('[hokoir-drop lc="'+ jQuery("#lc2").val() +'" pc="'+ jQuery("#pc2").val() +'" hbc="'+ jQuery("#hbc2").val() +'" htc="'+ jQuery("#htc2").val() +'" thbc="'+ jQuery("#thbc2").val() +'" thtc="'+ jQuery("#thtc2").val() +'" orc="'+ jQuery("#orc2").val() +'" erc="'+ jQuery("#erc2").val() +'" w="'+ jQuery("#w2").val() +'" num="'+ jQuery("#num2").val() +'" /]');
		jQuery("#res2").html('<object data="'+url2+'"/>');
        jQuery("#preview2").attr("href", url2);
        jQuery( "#gen2" ).click(function(e) {
		e.preventDefault();
		var url2 = "http://www.hoko.ir/priceDropProductsTable?lc="
                + jQuery("#lc2").val() + "&pc=" + jQuery("#pc2").val() + "&hbc=" + jQuery("#hbc2").val() + "&htc="
                + jQuery("#htc2").val() + "&thbc=" + jQuery("#thbc2").val() + "&thtc=" + jQuery("#thtc2").val()
                + "&orc=" + jQuery("#orc2").val() + "&erc=" + jQuery("#erc2").val() + "&w=" + jQuery("#w2").val()
                + "&num=" + jQuery("#num2").val();
			jQuery("#shortcode2").text('[hokoir-drop lc="'+ jQuery("#lc2").val() +'" pc="'+ jQuery("#pc2").val() +'" hbc="'+ jQuery("#hbc2").val() +'" htc="'+ jQuery("#htc2").val() +'" thbc="'+ jQuery("#thbc2").val() +'" thtc="'+ jQuery("#thtc2").val() +'" orc="'+ jQuery("#orc2").val() +'" erc="'+ jQuery("#erc2").val() +'" w="'+ jQuery("#w2").val() +'" num="'+ jQuery("#num2").val() +'" /]');
            jQuery("#res2").html('<object data="'+url2+'"/>');
			jQuery("#preview2").attr("href", url2);
        });
jQuery( "#defaults1" ).click(function(e) {
		e.preventDefault();
		jQuery("#lc").val('6495ED');
		jQuery("#pc").val('000000');
		jQuery("#hbc").val('F0FFFF');
		jQuery("#htc").val('000000');
		jQuery("#thbc").val('1ABC9C');
		jQuery("#thtc").val('FFFFFF');
		jQuery("#orc").val('FFFFFF');
		jQuery("#erc").val('F0FFFF');
		jQuery("#w").val('400');
		jQuery("#num").val('10');
});
jQuery( "#defaults2" ).click(function(e) {
		e.preventDefault();
		jQuery("#lc2").val('6495ED');
		jQuery("#pc2").val('000000');
		jQuery("#hbc2").val('F0FFFF');
		jQuery("#htc2").val('000000');
		jQuery("#thbc2").val('1ABC9C');
		jQuery("#thtc2").val('FFFFFF');
		jQuery("#orc2").val('FFFFFF');
		jQuery("#erc2").val('F0FFFF');
		jQuery("#w2").val('400');
		jQuery("#num2").val('10');
});