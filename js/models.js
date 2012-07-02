var Song = Backbone.Model.extend({
  initialize: function(){
    //console.log('hello');
  },
  defaults: {
    name: 'Peg',
    album: 'Aja',
    artist: 'Steely Dan'
  },
  urlRoot: '/song'
  
});

var Playlist = Backbone.Collection.extend({
  model: Song
});