$(function(){
    
    App.init();
    
});

var App = {
    init : function(){
    	model = new App.Song();
    	model.fetch();
        new App.View({ model: model});
    }
};
    App.Song = Backbone.Model.extend({
    	initialize: function(){
  		},
  		defaults: {
    		name: 'Peg',
    		album: 'Aja',
    		artist: 'Steely Dan'
  		},
  		urlRoot: '/song'
    });
    
    App.View = Backbone.View.extend({
       el: '#display',
       initialize: function(){
           this.template = $('#list-template').children();
           
           this.song = this.model.attributes;
           this.render();  //self render
           
       },
       render : function(){
       		var template = this.template;
     		$.each(this.song, function(key, value){
              	var li = template.clone().text;
     			console.log(this.song[key]);
     			$(this.el).find('ul').append(li).end();
     		}); 
     		//$(this.el).html('foo');  	
        }
        
    });
        
    
    
    