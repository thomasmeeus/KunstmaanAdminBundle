module.exports = function (grunt) {
    "use strict";

    var adminBundle;

    var resourcesPath = 'Resources/';

    adminBundle = {
        'all_scss':         [resourcesPath+'public/scss/**/*.scss'],
        'main_scss':        [resourcesPath+'public/scss/style.scss']
    };

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        watch: {
            adminBundleScss: {
                files: adminBundle.all_scss,
                tasks: ['sass', 'cmq', 'cssmin']
            },
            livereload: {
                files: ['Resources/public/dev-css/style.min.css'],
                options: {
                    livereload: true
                }
            }
        },

        sass: {
            adminBundle: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'Resources/public/.temp/dev-css/style.css': resourcesPath+'public/scss/style.scss'
                }
            }
        },

        cmq: {
            adminBundle: {
                files: {
                    'Resources/public/.temp/dev-css/': 'Resources/public/.temp/dev-css/style.css'
                }
            }
        },

        cssmin: {
            adminBundle: {
                files: {
                    'Resources/public/dev-css/style.min.css': 'Resources/public/.temp/dev-css/style.css'
                }
            }
        }

    });

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-combine-media-queries');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    grunt.registerTask('default', ['watch']);
    grunt.registerTask('build', ['sass', 'cmq', 'cssmin']);
};
