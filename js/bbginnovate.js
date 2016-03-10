jQuery(document).ready(function() { 
  function initAppSelect() {

    select1=[ 
      {
        "value":"MBN",
        "display":"MBN"
      },
      {
        "value":"OCB",
        "display":"OCB"
      },
      {
        "value":"VOANEWS",
        "display":"VOA News"
      },
      {
        "value":"VOAMOBILE",
        "display":"VOA Mobile"
      },
      {
        "value":"RFERL",
        "display":"RFE/RL"
      },
      {
        "value":"RFA",
        "display":"RFA"
      }
    ]

    entityDetails = {
      "MBN": [
        {
          "language":"English",
          "URL": "http://google.com/mbnEnglish"
        },
        {
          "language":"Arabic",
          "URL": "http://google.com/mbnArabic"
        },
      ],
      "OCB": [
        {
          "language": "English",
          "URL": "http://google.com/ocbEng"
        },
        {
          "language": "Spanish",
          "URL": "http://google.com/ocbSpan"
        },
      ]
    }
    
    /*** Populate the entity selector ****/
    var str = "";
    for (var i=0; i <select1.length;i++) {
      str+="<option value="+select1[i].value+">"+select1[i].display+"</option>";
    }
    jQuery("#appSelect select[name=entity]").append(str);
    
    /*** Show the form (we keep it hidden until it has data) ****/
    jQuery("#appSelect").css("display","");

    
    jQuery("#appSelect select[name=entity]").change(function() {
      var newEntity=jQuery(this).val();
      jQuery("#appSelect select[name=language]").empty();
      var newOptions=entityDetails[newEntity];
      var str="";
      for (var i=0; i < newOptions.length; i++) {
        var o = newOptions[i];
        str+="<option value='"+o.URL+"'>"+o.language+"</option>";
      }
      jQuery("#appSelect select[name=language]").append(str);
    })

    jQuery("#appSelect input[name=btnGo]").click(function() {
      var entityValue=jQuery("#appSelect select[name=entity]").val();
      var languageValue=jQuery("#appSelect select[name=language] option:selected").text();
      var targetUrl="";
      console.log('languageValue is ' + languageValue);
      for (var i=0; i < entityDetails[entityValue].length; i++) {
        var o = entityDetails[entityValue][i];
        if (o.language==languageValue) {
          console.log("we found it");
          targetUrl=o.URL;
        }
      }
      if (targetUrl != "") {
        window.location=targetUrl;
      }
    });
  }
  initAppSelect();

});