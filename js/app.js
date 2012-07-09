$(function() {

	App.init();

});

var App = {
	init: function() {
		model = new App.Song();
		//model.fetch();
		var tunes = new App.SongView({
			model: model
		});
		var controls = new App.ControllerView();
		var playlists = new App.playlists();
		var all_playlists = new App.AllPlaylistView({model: playlists});
		playlists.fetch();
		
		var playlist = new App.playlist();
		playlist.fetch();
		var cur_playlist = new App.CurrentPlaylistView({ model: playlist });
	}
};
App.Song = Backbone.Model.extend({
	initialize: function() {},
	defaults: {
		name: 'Peg',
		album: 'Aja',
		artist: 'Steely Dan'
	},
	urlRoot: '/song'
});

App.playlists = Backbone.Model.extend({
  urlRoot: '/getallplaylists'
});

App.playlist = Backbone.Model.extend({
  urlRoot: '/getcurrentplaylist'
});

App.ControllerView = Backbone.View.extend({
  // generic  widgt to control play/pause next etc ...
  el : '#controller', // remember all elements that are registered for click events must be descendents of el 

	events: {
		'click #prev': 'prev',
		'click #toggle': 'playpause',
		'click #next': 'next'
	},
	prev: function(e) {  // using jquery for ajax here because its just a command  doesn't really do anything
		$.ajax({  
		  url: '/prev'
		});
		var prevTune = new App.SongView({
			model: model
		});
	},
	
	playpause: function(e) {
		$.ajax({  // using jquery 
		  url: '/playpause'
		});
	},
	
	next: function(e) {
		$.ajax({  // using jquery 
		  url: '/next'
		});
		var nextTune = new App.SongView({
			model: model
		});
	}

});

App.SongView = Backbone.View.extend({

	el: '#display ul',
	initialize: function() {
		var self = this;
		this.template = $('#list-template').children();
		model.bind('change', this.render, this); // binding is very important to allow the view to read data returned from ajax call instead of just defaults
		this.model.fetch();
		//self render
	},
	
	render: function() {
		var name = this.model.get('name');
		var artist = this.model.get('artist');
		var album = this.model.get('album');
		var time = this.model.get('time');
    var this_playlist = this.model.get('playlist');
		var lis = '<li>' + name + '</li><li>' + artist + '</li><li>' + album + '</li><li>' + time + '</li>';

		//.each(this.model.toJSON(), function(value, key){
		//});
		$(this.el).html(lis);
		$('#playlist h2').text('Playlist: ' + this_playlist);
	}

});

App.AllPlaylistView = Backbone.View.extend({
  el : '#playlist_select select',
  initialize: function(){
    model.bind('change', this.render, this); // when the model changes run the render function for this View
    this.template = _.template($('#playlist_form_tmpl').html());
  },
  
  events: {
    'change' : 'change_playlist'
  },
  
	render: function() {
	  this.$el.html(this.template({ items: this.model.toJSON() }));
	},
	
	change_playlist : function(e){
	  console.log($('#playlist_select select').val());
	  var changed_playlist = new App.playlist();
	  changed_playlist.fetch();
    var cur_playlist = new App.CurrentPlaylistView({ model: changed_playlist });
	}
  
});

App.CurrentPlaylistView = Backbone.View.extend({
  el : '#playlist ol',
  initialize: function(){
    model.bind('change', this.render, this); // when the model changes run the render function for this View
    this.template = _.template($('#current_playlist_songs').html());
  },
	render: function() {
	  this.$el.html(this.template({ items: this.model.toJSON() }));
	}
  
});


