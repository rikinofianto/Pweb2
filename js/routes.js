routes = [
  {
    path: '/',
    async: function (routeTo, routeFrom, resolve, reject) {
      app.request.get('service/route.php?action=league',  function (data) {
        resolve(
            {
              componentUrl: './index.html'
            },
            // Custom template context
            {
              context: {
                leagues: JSON.parse(data).data,
              },
            }
        );
      });
    },
  },

  {
    path: '/add-league/',
    async: function (routeTo, routeFrom, resolve, reject) {
      app.request.json('js/country.json',  function (data) {
        resolve(
            {
              componentUrl: './pages/add-league.html'
            },
            // Custom template context
            {
              context: {
                countries: data,
              },
            }
        );
      });
    },
  },

  {
    path: '/league-detail/:id',
    async: function (routeTo, routeFrom, resolve, reject) {
      // ID from request
      var id = routeTo.params.id;
      app.request.get('service/route.php?action=league-detail&id='+id,  function (data) {

        resolve(
            {
              componentUrl: './pages/league-detail.html'
            },

            {
              context: {
                detail: JSON.parse(data).data,
              },
            }
        );
      });
    },
  },

  {
    path: '/team/',
    async: function (routeTo, routeFrom, resolve, reject) {
      app.request.get('service/route.php?action=team',  function (data) {
        resolve(
            {
              componentUrl: './pages/team.html'
            },
            {
              context: {
                teams: JSON.parse(data).data,
              },
            }
        );
      });
    },
  },

  {
    path: '/add-team/',
    async: function (routeTo, routeFrom, resolve, reject) {
      app.request.get('service/route.php?action=league',  function (data) {
        resolve(
            {
              componentUrl: './pages/add-team.html'
            },
            {
              context: {
                leagues: JSON.parse(data).data,
              },
            }
        );
      });
    },
  },

  {
    path: '/team-detail/:id',
    async: function (routeTo, routeFrom, resolve, reject) {
      // ID from request
      var id = routeTo.params.id;
      app.request.get('service/route.php?action=team-detail&id='+id,  function (data) {
        resolve(
            {
              componentUrl: './pages/team-detail.html'
            },

            {
              context: {
                detail: data,
              },
            }
        );
      });
    },
  },

  {
    path: '/player/',
    async: function (routeTo, routeFrom, resolve, reject) {
      app.request.get('service/route.php?action=player',  function (data) {
        resolve(
            {
              componentUrl: './pages/player.html'
            },
            {
              context: {
                players: JSON.parse(data).data,
              },
            }
        );
      });
    },
  },

  {
    path: '/add-player/',
    async: function (routeTo, routeFrom, resolve, reject) {
      app.request.get('service/route.php?action=team',  function (data) {
        resolve(
            {
              componentUrl: './pages/add-player.html'
            },
            // Custom template context
            {
              context: {
                teams: JSON.parse(data).data,
              },
            }
        );
      });
    },
  },

  {
    path: '/player-detail/:id',
    async: function (routeTo, routeFrom, resolve, reject) {
      // ID from request
      var id = routeTo.params.id;
      app.request.get('service/route.php?action=player-detail&id='+id,  function (data) {
        resolve(
            {
              componentUrl: './pages/player-detail.html'
            },

            {
              context: {
                detail: data,
              },
            }
        );
      });
    },
  },

  {
    path: '/request-and-load/user/:userId/',
    async: function (routeTo, routeFrom, resolve, reject) {
      // Router instance
      var router = this;

      // App instance
      var app = router.app;

      // Show Preloader
      app.preloader.show();

      // User ID from request
      var userId = routeTo.params.userId;

      // Simulate Ajax Request
      setTimeout(function () {
        // We got user data from request
        var user = {
          firstName: 'Vladimir',
          lastName: 'Kharlampidi',
          about: 'Hello, i am creator of Framework7! Hope you like it!',
          links: [
            {
              title: 'Framework7 Website',
              url: 'http://framework7.io',
            },
            {
              title: 'Framework7 Forum',
              url: 'http://forum.framework7.io',
            },
          ]
        };
        // Hide Preloader
        app.preloader.hide();

        // Resolve route to load page
        resolve(
          {
            componentUrl: './pages/request-and-load.html',
          },
          {
            context: {
              user: user,
            }
          }
        );
      }, 1000);
    },
  },
  // Default route (404 page). MUST BE THE LAST
  {
    path: '(.*)',
    url: './pages/404.html',
  },
];
