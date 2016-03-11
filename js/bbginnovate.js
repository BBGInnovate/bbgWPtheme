jQuery(document).ready(function() {
    function initAppSelect() {

        select1 = [{
            "value": "VOANEWS",
            "display": "VOA News"
        }, {
            "value": "ALHURRA",
            "display": "Alhurra TV"
        }, {
            "value": "SAWA",
            "display": "Radio Sawa"
        }, {
            "value": "MARTI",
            "display": "Martí Noticias"
        }, {
            "value": "RFERL",
            "display": "Radio Free Europe/Radio Liberty"
        }, {
            "value": "RFA",
            "display": "Radio Free Asia"
        }];

        entityDetails = {
            "VOANEWS": [{
                "language": "Amharic",
                "URL": "http://www.getjar.mobi/mobile/848255/VOA-Amharic-for-Java-Phones"
            }, {
                "language": "Chinese Simplified",
                "URL": "http://www.getjar.mobi/mobile/848265/VOA-Chinese-Simplified-for-Java-Phones"
            }, {
                "language": "Chinese Traditional",
                "URL": "http://www.getjar.mobi/mobile/848266/VOA-Chinese-Traditional-for-Java-Phones"
            }, {
                "language": "English",
                "URL": "http://www.getjar.mobi/mobile/847025/VOA-News-for-Java-Phones"
            }, {
                "language": "French",
                "URL": "http://www.getjar.mobi/mobile/848176/VOA-French-for-Java-Phones"
            }, {
                "language": "Indonesian",
                "URL": "http://www.getjar.mobi/mobile/848263/VOA-Indonesian-for-Java-Phones"
            }, {
                "language": "Korean",
                "URL": "http://www.getjar.mobi/mobile/848269/VOA-Korean-for-Java-Phones"
            }, {
                "language": "Persian",
                "URL": "http://www.getjar.mobi/mobile/848262/VOA-Persian-for-Java-Phones"
            }, {
                "language": "Portuguese",
                "URL": "http://www.getjar.mobi/mobile/848253/VOA-Portuguese-for-Java-Phones"
            }, {
                "language": "Russian",
                "URL": "http://www.getjar.mobi/mobile/848272/VOA-Russian-for-Java-Phones"
            }, {
                "language": "Serbian",
                "URL": "http://www.getjar.mobi/mobile/848274/VOA-Serbian-for-Java-Phones"
            }, {
                "language": "Spanish",
                "URL": "http://www.getjar.mobi/mobile/848260/VOA-Spanish-for-Java-Phones"
            }, {
                "language": "Swahili",
                "URL": "http://www.getjar.mobi/mobile/848254/VOA-Swahili-for-Java-Phones"
            }, {
                "language": "Thai",
                "URL": "http://www.getjar.mobi/mobile/848264/VOA-Thai-for-Java-Phones"
            }, {
                "language": "Turkish",
                "URL": "http://www.getjar.mobi/mobile/848271/VOA-Turkish-for-Java-Phones"
            }, {
                "language": "Ukrainian",
                "URL": "http://www.getjar.mobi/mobile/848273/VOA-Ukrainian-for-Java-Phones"
            }, {
                "language": "Vietnamese",
                "URL": "http://www.getjar.mobi/mobile/848268/VOA-Vietnamese-for-Java-Phones"
            }],

            "ALHURRA": [{
                "language": "Arabic",
                "URL": "http://www.getjar.com/mobile/848171/-Alhurra-for-Java-Phones/"
            }],

            "SAWA": [{
                "language": "Arabic",
                "URL": "http://www.getjar.com/mobile/851300/-Radio-Sawa-for-Java-Phones/"
            }],

            "MARTI": [{
                "language": "Spanish",
                "URL": "http://www.getjar.mobi/mobile/848168/OCB-Mart-Noticias-for-Java-Phones"
            }, ],

            "RFERL": [{
                "language": "Belarusian",
                "URL": "http://www.getjar.mobi/mobile/848341/RFERL-Belarusian-for-Java-Phones"
            }, {
                "language": "English",
                "URL": "http://www.getjar.mobi/mobile/848340/RFERL-English-for-Java-Phones"
            }, {
                "language": "Persian",
                "URL": "http://www.getjar.mobi/mobile/848343/RFERL-Persian-for-Java-Phones"
            }, {
                "language": "Russian",
                "URL": "http://www.getjar.mobi/mobile/848344/RFERL-Russian-for-Java-Phones"
            }, {
                "language": "Ukrainian",
                "URL": "http://www.getjar.mobi/mobile/848345/RFERL-Ukrainian-for-Java-Phones"
            }],

            "RFA": [{
                "language": "Chinese Simplified",
                "URL": "http://www.getjar.mobi/mobile/848351/RFA-Chinese-Simplified-for-Java-Phones"
            }, {
                "language": "Chinese Traditional",
                "URL": "www.getjar.mobi/mobile/848352/RFA-Chinese-Traditional-for-Java-Phones"
            }, {
                "language": "English",
                "URL": "http://www.getjar.mobi/mobile/848349/RFA-English-for-Java-Phones"
            }, {
                "language": "Korean",
                "URL": "http://www.getjar.mobi/mobile/848353/RFA-Korean-for-Java-Phones"
            }, {
                "language": "Vietnamese",
                "URL": "http://www.getjar.mobi/mobile/848354/RFA-Vietnamese-for-Java-Phones"
            }]
        };

        /*** Populate the entity selector ****/
        var str = "";
        for (var i = 0; i < select1.length; i++) {
            str += "<option value=" + select1[i].value + ">" + select1[i].display + "</option>";
        }
        jQuery("#appSelect select[name=entity]").append(str);

        /*** Show the form (we keep it hidden until it has data) ****/
        console.log('show the app select form');
        jQuery("#appSelect").css("display", "block");

        jQuery("#appSelect select[name=entity]").change(function() {
            var newEntity = jQuery(this).val();
            jQuery("#appSelect select[name=language]").empty();
            var newOptions = entityDetails[newEntity];
            var str = "";
            for (var i = 0; i < newOptions.length; i++) {
                var o = newOptions[i];
                str += "<option value='" + o.URL + "'>" + o.language + "</option>";
            }
            jQuery("#appSelect select[name=language]").append(str);
            /*** Show the second field once it's populated ****/
            jQuery("#languages").css("display", "block");
        })

        jQuery("#appSelect input[name=btnGo]").click(function() {
            var entityValue = jQuery("#appSelect select[name=entity]").val();
            var languageValue = jQuery("#appSelect select[name=language] option:selected").text();
            var targetUrl = "";
            for (var i = 0; i < entityDetails[entityValue].length; i++) {
                var o = entityDetails[entityValue][i];
                if (o.language == languageValue) {
                    targetUrl = o.URL;
                }
            }
            if (targetUrl != "") {
                window.open(targetUrl, '_blank');
            }
        });
    }
    initAppSelect();

});