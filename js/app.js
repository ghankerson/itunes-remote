$(function(){
    
    App.init();
    
});

var App = {
    init : function(){
        model = new App.Song();
        //model.fetch();
        new App.View({
            model: model
        });
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
        model.bind('change', this.render, this);
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
        
        console.log(lis);
    $(this.el).html(lis);  	
    }
        
});
        
    
    
    