-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 05:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `take_note_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color_name`, `name`) VALUES
(1, 'Yellow', '#e9e582'),
(2, 'Pink', '#efaaab'),
(3, 'Blue', '#6cb5df'),
(4, 'Purple', '#bf77f6'),
(5, 'Gray', '#f9ebdf'),
(6, 'Green', '#90ee90'),
(7, 'Orange', '#ffb38a'),
(8, 'Red', '#f15b50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notes`
--

CREATE TABLE `tbl_notes` (
  `tbl_notes_id` int(11) NOT NULL,
  `note_title` text NOT NULL,
  `note` longtext NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bg_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_notes`
--

INSERT INTO `tbl_notes` (`tbl_notes_id`, `note_title`, `note`, `date_time`, `bg_color`) VALUES
(11, 'What is PHP? ', 'PHP (recursive acronym for PHP: Hypertext Preprocessor) is a widely-used open source general-purpose scripting language that is especially suited for web development and can be embedded into HTML.\r\nInstead of lots of commands to output HTML (as seen in C or Perl), PHP pages contain HTML with embedded code that does \"something\" (in this case, output \"Hi, I\'m a PHP script!\"). The PHP code is enclosed in special start and end processing instructions <?php and ?> that allow you to jump into and out of \"PHP mode.\"\r\n\r\nWhat distinguishes PHP from something like client-side JavaScript is that the code is executed on the server, generating HTML which is then sent to the client. The client would receive the results of running that script, but would not know what the underlying code was. You can even configure your web server to process all your HTML files with PHP, and then there\'s really no way that users can tell what you have up your sleeve.\r\n\r\nThe best part about using PHP is that it is extremely simple for a newcomer, but offers many advanced features for a professional programmer. Don\'t be afraid to read the long list of PHP\'s features. You can jump in, in a short time, and start writing simple scripts in a few hours.\r\n', '2024-11-06 16:08:30', '#e9e582'),
(12, 'What is CSS', 'CSS (Cascading Style Sheets) is a stylesheet language used to describe the presentation of a web page written in HTML or XML. CSS defines how elements should be displayed, such as their layout, colors, fonts, spacing, and positioning. It allows web designers to separate the structure (HTML) from the style, making it easier to manage and update the look and feel of a website.\r\n\r\nKey features of CSS include:\r\n\r\nSelectors: Define which HTML elements the styles will apply to.\r\nProperties: Define specific style features (e.g., color, font-size, margin, padding).\r\nValues: Set values for the properties (e.g., color: red;, font-size: 16px;).\r\nCSS also supports responsive design, enabling web pages to adapt their layout to different screen sizes and devices.', '2024-11-06 15:52:15', '#efaaab'),
(19, 'What is HTML?', 'The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It defines the meaning and structure of web content. It is often assisted by technologies such as Cascading Style Sheets (CSS) and scripting languages such as JavaScript.\r\n\r\nWeb browsers receive HTML documents from a web server or from local storage and render the documents into multimedia web pages. HTML describes the structure of a web page semantically and originally included cues for its appearance.\r\n\r\nHTML elements are the building blocks of HTML pages. With HTML constructs, images and other objects such as interactive forms may be embedded into the rendered page. HTML provides a means to create structured documents by denoting structural semantics for text such as headings, paragraphs, lists, links, quotes, and other items. HTML elements are delineated by tags, written using angle brackets. Tags such as input directly introduce content into the page. Other tags such as and  surround p and /p provide information about document text and may include sub-element tags. Browsers do not display the HTML tags but use them to interpret the content of the page.\r\n', '2024-11-06 07:19:19', '#6cb5df'),
(23, 'What is Javascript?', 'JavaScript is a high-level programming language that enables interactive and dynamic content on websites. It is one of the core components of web development, along with HTML and CSS, and allows developers to make web pages that respond to user actions in real-time. By running in the browser, JavaScript can handle tasks directly on the client side, making web experiences smoother and more engaging. This means that actions like updating content, creating animations, and validating form inputs can all be done without requiring a page reload, enhancing the responsiveness of the site.\r\n\r\nInitially designed for client-side scripting, JavaScript has since expanded to include server-side development with the advent of Node.js. This evolution allows developers to use JavaScript for full-stack development, building everything from the front-end interface to the back-end logic with a single language. The language’s flexibility, combined with a vast ecosystem of libraries and frameworks, has made it an essential tool for modern web development.\r\n\r\nThanks to its versatility, JavaScript has become one of the most popular languages for building interactive web applications. With its ability to create dynamic user experiences and adapt to different development environments, JavaScript remains foundational to enhancing how users interact with and experience the web.', '2024-11-06 16:12:46', '#90ee90'),
(24, 'What is Bootstrap?', 'Bootstrap is a popular open-source front-end framework used for building responsive, mobile-first websites quickly and efficiently. Developed by Twitter, Bootstrap includes pre-designed HTML, CSS, and JavaScript components that allow developers to create visually consistent and functional layouts without writing extensive custom code. It provides a standardized set of tools and styles for common elements like navigation bars, forms, buttons, grids, and modals, making web development faster and more accessible.\r\n\r\nOne of Bootstrap\'s core features is its responsive grid system, which uses a flexible layout that adjusts based on the user’s screen size and device. This grid system allows developers to create layouts that automatically adapt to different screen sizes, ensuring a good user experience on mobile devices, tablets, and desktops. Bootstrap also comes with a variety of utilities and helper classes that make it easy to adjust spacing, alignment, colors, and typography across the site.\r\n\r\nBootstrap\'s extensive documentation and ease of use have made it one of the most widely used front-end frameworks, especially valuable for rapid prototyping and for developers who want to create clean, professional-looking websites with minimal custom styling.', '2024-11-06 16:27:31', '#ffb38a'),
(25, 'What is Jquery?', 'jQuery is a fast, lightweight JavaScript library designed to simplify HTML manipulation, event handling, animations, and AJAX interactions. Released in 2006, it quickly became popular for its ability to streamline common tasks that would otherwise require complex JavaScript code. With its concise syntax and cross-browser compatibility, jQuery makes it easy to add interactive features to websites without dealing with browser inconsistencies.\r\n\r\nOne of jQuery’s core advantages is its simplified approach to selecting and manipulating HTML elements using CSS-like selectors. For example, instead of writing complex JavaScript functions to locate and update elements, jQuery allows you to accomplish the same tasks with shorter, more readable code. Additionally, jQuery provides powerful animations and effects with minimal coding, enabling developers to create smooth, dynamic interfaces.\r\n\r\njQuery also includes AJAX methods for sending and retrieving data from servers asynchronously, allowing developers to update parts of a webpage without reloading the entire page. This feature is especially valuable for creating fast and responsive web applications.\r\n\r\nAlthough newer JavaScript frameworks and libraries like React and Vue have reduced its prominence, jQuery remains widely used in legacy projects and is still valued for its simplicity and effectiveness in handling straightforward web development tasks.\r\n\r\nAlthough newer JavaScript frameworks and libraries like React and Vue have reduced its prominence, jQuery remains widely used in legacy projects and is still valued for its simplicity and effectiveness in handling straightforward web development tasks.', '2024-11-06 16:29:48', '#f9ebdf'),
(26, 'What is Flutter', 'Flutter is an open-source UI software development toolkit created by Google for building natively compiled applications from a single codebase. It enables developers to create high-performance applications for multiple platforms, including iOS, Android, web, and desktop, without needing to write separate code for each platform. Flutter is known for its fast development cycles, expressive and flexible UI, and smooth animations.\r\n\r\nFlutter uses Dart, a programming language also developed by Google, which is optimized for fast, high-performance applications. One of Flutter\'s key features is its \"hot reload\" functionality, which allows developers to see code changes in real-time without restarting the application. This feature speeds up the development process significantly, making it easier to experiment, test, and refine code.\r\n\r\nFlutter provides a rich set of customizable widgets that mimic the native look and feel of different platforms. Instead of relying on platform-specific components, Flutter renders its own widgets and UI elements, giving developers extensive control over the design and appearance of their applications. These widgets also help ensure a consistent appearance across devices, regardless of the platform or screen size.\r\n\r\nBecause of its efficiency and ability to produce beautiful, high-performance applications, Flutter has become a popular choice for companies and developers who want to build cross-platform applications without compromising on speed or user experience.', '2024-11-06 16:29:43', '#f15b50'),
(27, 'What is Database?', 'A database is an organized collection of data that is stored and managed to allow for efficient retrieval, manipulation, and updating. It is designed to handle tasks such as storing information, querying it, updating records, and maintaining data consistency and integrity. Databases make it easy for users or applications to access and modify data in a systematic and structured manner.\r\n\r\nThere are different types of databases, each with its own approach to how data is stored and structured. Relational databases, for example, organize data in tables with rows and columns, using SQL (Structured Query Language) for querying and managing data. Examples of relational databases include MySQL, PostgreSQL, and Oracle. On the other hand, NoSQL databases are designed to handle more flexible and unstructured data models, making them suitable for applications that require handling large volumes of varied data. Popular NoSQL databases include MongoDB, Cassandra, and Redis. File-based databases, such as SQLite, store data directly in files on the file system, and are often used for smaller applications.\r\n\r\nDatabases are fundamental for managing information in a wide range of applications, such as e-commerce, banking, content management systems, and social media platforms. They support essential operations like searching, sorting, inserting, deleting, and updating data, making them critical for the functioning of modern software systems.', '2024-11-06 09:24:57', '#bf77f6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  ADD PRIMARY KEY (`tbl_notes_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  MODIFY `tbl_notes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
