import gulp from 'gulp';
import imagemin from 'gulp-imagemin';
import uglify from 'gulp-uglify';
// import sass from 'gulp-sass' ; 

gulp.task('msg', async function(){
	return console.log('learning gulp.......');
});




gulp.task('copyphp', async function(){
	gulp.src('src/templates/*.php')
	.pipe(gulp.dest('dest/templates'));
});



 gulp.task('imageMin', () => 
	gulp.src('src/images/*')
		.pipe(imagemin())
		.pipe(gulp.dest('dest/images'))
); 


 gulp.task('minify', async function(){
 	gulp.src('src/js/*')
 	.pipe(uglify())
		.pipe(gulp.dest('dest/js'));
 });



//not working:
 gulp.task('sass', async function(){
 	gulp.src('src/sass/*.scss')
 	.pipe(sass().on('error', sass.logError))
		.pipe(gulp.dest('dest/css'));
 });



//not working:
 gulp.task('default', ['msg', 'copyphp', 'imageMin', 'minify' ]);

