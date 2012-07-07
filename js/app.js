$(function(){
    
    App.init();
    
});

var App = {
    init : function(){
        model = new App.Song();
        //model.fetch();
        var tunes = new App.View({
            model: model
        });
        var controls = new App.ControllerView();
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
    
App.View = Backbone.View.extend(
{
    
    el: '#display ul',
    initialize: function(){
        var self = this;
        this.template = $('#list-template').children();
        model.bind('change', this.render, this); // binding is very important to allow the view to read data returned from ajax call instead of just defaults
        this.model.fetch(); 
    //self render
           
    },
    render : function(){
        //console.log(this.model.get('name'));
        var name = this.model.get('name');
        var artist = this.model.get('artist');
        var album = this.model.get('album');
        var time = this.model.get('time');
        
        var lis = '<li>' + name + '</li><li>' + artist + '</li><li>' + album + '</li><li>' + time + '</li>';

        _//.each(this.model.toJSON(), function(value, key){
        //});
        
        $(this.el).html(lis);  	
    }

    
});

App.ControllerView = Backbone.View.extend({
    initialize: function(){
        console.log('trying for click event');
    },
    events: {
        'click #toggle': 'playpause'
               
    },
   
    playpause:  function(){
        console.log('click event');
    }
});