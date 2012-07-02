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
       	   console.log(this);	
           artist = this.song['artist'];
           //name = this.song.get('name');
           //album = this.song.get('album');
           $.each(this.model.attributes, function(key, value){
           	//console.log($(this.el).find('ul'));
           	var li = $(this.template).clone().text(value);
			$(this.el).find('ul').append(li);
			$(this.el).html('foo');
           });
           	
           
              
        
            
       } 
    });
    
    