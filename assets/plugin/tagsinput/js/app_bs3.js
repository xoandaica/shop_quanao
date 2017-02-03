
var citynames=[
    {name:"Amsterdam"} ,
    {name:"London"} ,
    {name:"Paris"} ,
    {name:"Washington"} ,
    {name:"New York"} ,
    {name:"Los Angeles"} ,
    {name:"Sydney"}
];

var citynames = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  local:citynames
});
citynames.initialize();


var cities2=[
    { "value": 1 , "text": "Amsterdam"   , "continent": "Europe"    },
    { "value": 2 , "text": "London"      , "continent": "Europe"    },
    { "value": 3 , "text": "Paris"       , "continent": "Europe"    },
    { "value": 4 , "text": "Washington"  , "continent": "America"   },
    { "value": 5 , "text": "Mexico City" , "continent": "America"   },
    { "value": 6 , "text": "Buenos Aires", "continent": "America"   },
    { "value": 7 , "text": "Sydney"      , "continent": "Australia" },
    { "value": 8 , "text": "Wellington"  , "continent": "Australia" },
    { "value": 9 , "text": "Canberra"    , "continent": "Australia" },
    { "value": 10, "text": "Beijing"     , "continent": "Asia"      },
    { "value": 11, "text": "New Delhi"   , "continent": "Asia"      },
    { "value": 12, "text": "Kathmandu"   , "continent": "Asia"      },
    { "value": 13, "text": "Cairo"       , "continent": "Africa"    },
    { "value": 14, "text": "Cape Town"   , "continent": "Africa"    },
    { "value": 15, "text": "Kinshasa"    , "continent": "Africa"    }
];

var cities2 = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: cities2
});
cities2.initialize();


/*var cities = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: 'assets/cities.json'
});
cities.initialize();*/

/**
 * Typeahead
 */


var elt = $('.example_typeahead > > input');
elt.tagsinput({
  typeaheadjs: {
    name: 'citynames',
    displayKey: 'name',
    valueKey: 'name',
    source: citynames.ttAdapter()
  }
});

/**
 * Objects as tags
 */



elt = $('.example_objects_as_tags > > input');
elt.tagsinput({
    itemValue: 'value',
    itemText: 'text',
    typeaheadjs: {
        name: 'cities2',
        displayKey: 'text',
        source: cities2.ttAdapter()
    }
});




/*elt = $('.example_objects_as_tags > > input');
elt.tagsinput({
  itemValue: 'value',
  itemText: 'text',
  typeaheadjs: {
    name: 'cities',
    displayKey: 'text',
    source: cities.ttAdapter()
  }
});*/

elt.tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Europe"    });
elt.tagsinput('add', { "value": 4 , "text": "Washington"  , "continent": "America"   });
//elt.tagsinput('add', { "value": 7 , "text": "Sydney"      , "continent": "Australia" });
//elt.tagsinput('add', { "value": 10, "text": "Beijing"     , "continent": "Asia"      });
//elt.tagsinput('add', { "value": 13, "text": "Cairo"       , "continent": "Africa"    });

/**
 * Categorizing tags
 */
elt = $('.example_tagclass > > input');
elt.tagsinput({
  tagClass: function(item) {
    switch (item.continent) {
      case 'Europe'   : return 'label label-primary';
      case 'America'  : return 'label label-danger label-important';
      case 'Australia': return 'label label-success';
      case 'Africa'   : return 'label label-default';
      case 'Asia'     : return 'label label-warning';
    }
  },
  itemValue: 'value',
  itemText: 'text',
  // typeaheadjs: {
  //   name: 'cities',
  //   displayKey: 'text',
  //   source: cities.ttAdapter()
  // }
  typeaheadjs: [
  {
     hint: true,
     highlight: true,
     minLength: 1
  },
   {
      name: 'cities2',
       displayKey: 'text',
       source: cities2.ttAdapter()
   }
  ]
});
//elt.tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Europe"    });
//elt.tagsinput('add', { "value": 4 , "text": "Washington"  , "continent": "America"   });
//elt.tagsinput('add', { "value": 7 , "text": "Sydney"      , "continent": "Australia" });
elt.tagsinput('add', { "value": 10, "text": "Beijing"     , "continent": "Asia"      });
elt.tagsinput('add', { "value": 13, "text": "Cairo"       , "continent": "Africa"    });

// HACK: overrule hardcoded display inline-block of typeahead.js
$(".twitter-typeahead").css('display', 'inline');
