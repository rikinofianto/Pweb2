// Dom7
var $$ = Dom7;

// Framework7 App main instance
var app  = new Framework7({
  root: '#app', // App root element
  id: 'com.framework7.bola', // App bundle ID
  name: 'Bola', // App name
  theme: 'auto', // Automatic theme detection
  // App root methods
  // App routes
  routes: routes,
  data : function() {
    return {

    }
  },
  ignoreCache: true,
  force: true,
});

// Init/Create views
var leagueView = app.views.create('#view-league', {
  url: '/'
});
var teamView = app.views.create('#view-team', {
  url: '/team/'
});
var playerView = app.views.create('#view-player', {
  url: '/player/'
});
