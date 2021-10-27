USE php_start;

DROP TABLE IF EXISTS reviews;
CREATE TABLE reviews (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    dater DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    textr VARCHAR(1000),
    imgPath VARCHAR(50)
);
INSERT ignore INTO reviews (textr, imgPath) 
VALUES
( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et rhoncus ante. Duis vulputate lacus tortor, ac egestas nisi lobortis vel. Sed volutpat leo pharetra, vehicula libero ac, ultrices mauris. Morbi nec rutrum risus. Quisque nec enim tincidunt, blandit risus in, aliquam justo. Nam id pulvinar nulla. Aliquam at fermentum velit. Vivamus a porta turpis, vel tincidunt odio.', './img/1231245512.jpg'),
( 'Donec id purus eget lorem fermentum fermentum. Nullam vestibulum, nibh a sollicitudin semper, sapien nisl aliquet augue, a volutpat ex magna vitae nisi. Praesent faucibus venenatis ex quis vestibulum. Nulla facilisi. Etiam consequat vulputate enim sed vestibulum. Mauris condimentum placerat tortor, id dignissim neque auctor at. Duis consectetur vulputate eros nec auctor. Curabitur eu ex urna. Integer lorem odio, euismod sed dictum non, tempus id nibh.', './img/12412412.jpg'),
( 'Donec lacinia viverra ipsum sit amet viverra. Praesent fringilla quam at tellus ultricies, sed venenatis massa sagittis. Cras vitae ullamcorper mi.Nulla vel semper justo. ', './img/1551231.jpg'),
( 'Quisque molestie aliquam turpis, id pharetra nisl porttitor sit amet. Sed faucibus tempus nulla. Pellentesque nec felis non lectus elementum rhoncus sagittis a diam. Ut mauris sapien, blandit maximus sem ac, iaculis laoreet purus. Donec ornare nec leo id bibendum. Aliquam erat volutpat.', './img/2.jpg'),
( 'Mauris eu augue et diam ultrices luctus. Duis sed leo diam. Vestibulum condimentum diam eu tellus pulvinar, non commodo libero dapibus. Sed rutrum mauris lorem, eget facilisis nisl cursus quis. Sed in imperdiet diam.', './img/3.jpg'),
( 'Nulla vel pulvinar urna. Quisque quis viverra mauris. Sed nisl lorem, efficitur nec nunc et, sodales tempor velit. Interdum et malesuada fames ac ante ipsum primis in faucibus.', './img/4.jpg'),
( ' Quisque ultricies rhoncus nunc, ac cursus dui dignissim non. Sed sodales pellentesque sapien non ultrices. In hac habitasse platea dictumst. Ut semper libero ut nisi faucibus auctor.', './img/5.jpg'),
( 'Vestibulum tincidunt viverra dolor, nec scelerisque quam facilisis eget. Donec auctor nibh quam, sed condimentum ipsum condimentum at. Aliquam lobortis sit amet nulla sed lacinia. Etiam orci velit, efficitur sagittis scelerisque in, congue at metus. Aliquam erat volutpat. Curabitur metus ex, convallis eu mattis sit amet, vehicula at purus. Morbi semper arcu orci, et ultricies ante pretium sed. Nulla facilisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce venenatis felis eu diam suscipit dignissim. Vivamus at urna nec nulla congue imperdiet sed at nisl.', './img/6.jpg');