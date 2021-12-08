<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>

        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }

        html {
            box-sizing: border-box;
        }

        *, *:before, *:after {
            box-sizing: inherit;
        }

        .column {
            float: left;
            width: 33.3%;
            margin-bottom: 16px;
            padding: 0 8px;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 8px;
        }

        .about-section {
            padding: 50px;
            text-align: center;
            background-color: #474e5d;
            color: white;
        }

        .container {
            padding: 0 16px;
        }

        .container::after, .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .title {
            color: grey;
        }

        .button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
        }

        .button:hover {
            background-color: #555;
        }

        @media screen and (max-width: 650px) {
            .column {
                width: 100%;
                display: block;
            }
            body {
                margin: 0;
                padding: 0;
                background-color: #000;
                padding-bottom: 100px;
            }

            #contact {
                width: 100%;
                height: 100%;
            }

            .section-header {
                text-align: center;
                margin: 0 auto;
                padding: 40px 0;
                font: 300 60px 'Oswald', sans-serif;
                color: #fff;
                text-transform: uppercase;
                letter-spacing: 6px;
            }

            .contact-wrapper {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                margin: 0 auto;
                padding: 20px;
                position: relative;
                max-width: 840px;
            }

            /* Left contact page */
            .form-horizontal {
                /*float: left;*/
                max-width: 400px;
                font-family: 'Lato';
                font-weight: 400;
            }

            .form-control,
            textarea {
                max-width: 400px;
                background-color: #000;
                color: #fff;
                letter-spacing: 1px;
            }

            .send-button {
                margin-top: 15px;
                height: 34px;
                width: 400px;
                overflow: hidden;
                transition: all .2s ease-in-out;
            }

            .alt-send-button {
                width: 400px;
                height: 34px;
                transition: all .2s ease-in-out;
            }

            .send-text {
                display: block;
                margin-top: 10px;
                font: 700 12px 'Lato', sans-serif;
                letter-spacing: 2px;
            }

            .alt-send-button:hover {
                transform: translate3d(0px, -29px, 0px);
            }

            /* Begin Right Contact Page */
            .direct-contact-container {
                max-width: 400px;
            }

            /* Location, Phone, Email Section */
            .contact-list {
                list-style-type: none;
                margin-left: -30px;
                padding-right: 20px;
            }

            .list-item {
                line-height: 4;
                color: #aaa;
            }

            .contact-text {
                font: 300 18px 'Lato', sans-serif;
                letter-spacing: 1.9px;
                color: #bbb;
            }

            .place {
                margin-left: 62px;
            }

            .phone {
                margin-left: 56px;
            }

            .gmail {
                margin-left: 53px;
            }

            .contact-text a {
                color: #bbb;
                text-decoration: none;
                transition-duration: 0.2s;
            }

            .contact-text a:hover {
                color: #fff;
                text-decoration: none;
            }


            /* Social Media Icons */
            .social-media-list {
                position: relative;
                font-size: 22px;
                text-align: center;
                width: 100%;
                margin: 0 auto;
                padding: 0;
            }

            .social-media-list li a {
                color: #fff;
            }

            .social-media-list li {
                position: relative;
                display: inline-block;
                height: 60px;
                width: 60px;
                margin: 10px 3px;
                line-height: 60px;
                border-radius: 50%;
                color: #fff;
                background-color: rgb(27,27,27);
                cursor: pointer;
                transition: all .2s ease-in-out;
            }

            .social-media-list li:after {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 60px;
                height: 60px;
                line-height: 60px;
                border-radius: 50%;
                opacity: 0;
                box-shadow: 0 0 0 1px #fff;
                transition: all .2s ease-in-out;
            }

            .social-media-list li:hover {
                background-color: #fff;
            }

            .social-media-list li:hover:after {
                opacity: 1;
                transform: scale(1.12);
                transition-timing-function: cubic-bezier(0.37,0.74,0.15,1.65);
            }

            .social-media-list li:hover a {
                color: #000;
            }

            .copyright {
                font: 200 14px 'Oswald', sans-serif;
                color: #555;
                letter-spacing: 1px;
                text-align: center;
            }

            hr {
                border-color: rgba(255,255,255,.6);
            }

            /* Begin Media Queries*/
            @media screen and (max-width: 850px) {
                .contact-wrapper {
                    display: flex;
                    flex-direction: column;
                }
                .direct-contact-container, .form-horizontal {
                    margin: 0 auto;
                }

                .direct-contact-container {
                    margin-top: 60px;
                    max-width: 300px;
                }
                .social-media-list li {
                    height: 60px;
                    width: 60px;
                    line-height: 60px;
                }
                .social-media-list li:after {
                    width: 60px;
                    height: 60px;
                    line-height: 60px;
                }
            }
            /*

All grid code is placed in a 'supports' rule (feature query) at the bottom of the CSS (Line 77).

The 'supports' rule will only run if your browser supports CSS grid.

Flexbox is used as a fallback so that browsers which don't support grid will still recieve an identical layout.

*/

            @import url(https://fonts.googleapis.com/css?family=Montserrat:500);

            :root {
                /* Base font size */
                font-size: 10px;
            }

            *,
            *::before,
            *::after {
                box-sizing: border-box;
            }

            body {
                min-height: 100vh;
                background-color: #fafafa;
            }

            .container {
                max-width: 100rem;
                margin: 0 auto;
                padding: 0 2rem 2rem;
            }

            .heading {
                font-family: "Montserrat", Arial, sans-serif;
                font-size: 4rem;
                font-weight: 500;
                line-height: 1.5;
                text-align: center;
                padding: 3.5rem 0;
                color: #1a1a1a;
            }

            .heading span {
                display: block;
            }

            .gallery {
                display: flex;
                flex-wrap: wrap;
                /* Compensate for excess margin on outer gallery flex items */
                margin: -1rem -1rem;
            }

            .gallery-item {
                /* Minimum width of 24rem and grow to fit available space */
                flex: 1 0 24rem;
                /* Margin value should be half of grid-gap value as margins on flex items don't collapse */
                margin: 1rem;
                box-shadow: 0.3rem 0.4rem 0.4rem rgba(0, 0, 0, 0.4);
                overflow: hidden;
            }

            .gallery-image {
                display:;
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 400ms ease-out;
            }

            .gallery-image:hover {
                transform: scale(1.15);
            }

            /*

            The following rule will only run if your browser supports CSS grid.

            Remove or comment-out the code block below to see how the browser will fall-back to flexbox styling.

            */

            @supports (display: grid) {
                .gallery {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(24rem, 1fr));
                    grid-gap: 2rem;
                }

                .gallery,
                .gallery-item {
                    margin: 0;
                }
            }



        }

    </style>
</head>
<title>About us</title>
<body>
<p align="left"><a href="userhomepage.php">Go Back</a></p>

<div class="about-section">
    <h1>About Us</h1>
    <p>We Have In Our DNA, Recipes!

        Many would attribute the best Restaurant in town to sheer dedication and hard work.We would say in our case genes had their role too...

        We inherited from our Father late Neeliyath Hassan Haji an unrelenting passion to tickle your taste buds. He taught us the art of cooking food and serving love. If we were to recall our legacy of running the number one restaurant in Sultan Bathery for the last two decades, his instant response would be, “I have done it in almost all the towns where I had a brief stay, my kids”.

        Yes, he ventured out of his home in Vadakara, Kerala for a livelihood and ended up setting up food hubs that became the talk of the town, in almost all the places he had to stay for a while. He kept on setting up food outlets that redefined the very aroma of those localities.

        His initial venture at Alappuzha, Kerala, three restaurants he managed simultaneously in the northern parts of India in and around independence, finally the Thoufeeq Hotel in Meenangadi, Wayanad, to which he was the managing partner for almost 43 years, before his demise in 2016 - all stand testimony to his claim.

        It was his vision and seasoned tips that helped us revolutionize the food court perceptions in Wayanad. Now it is time we take the legend forward.

        Come, reserve your favourite spot at Wilton and unleash the Foodie in you!







</div>

<center><p style="font-size: 30px"><b>OPENING TIME!!!</b></p><br>
    <img src="food.png" style="height: 200px;width: 200px"><br><br><br>MONDAY-SUNDAY<br><br>09:00 AM-11.00 PM
    </center>

<div class="container">

    <h1 class="heading">Image Gallery </h1>
    <table>

    <div class="gallery" >
<tr>
        <div class="gallery-item">
            <td><img class="gallery-image" style="width: 100%;height: 200px" src="wilton3.jpg" alt="person writing in a notebook beside by an iPad, laptop, printed photos, spectacles, and a cup of coffee on a saucer">
            </td> </div><br><br>



        <div class="gallery-item">
            <td><img class="gallery-image" style="width: 100%;height: 200px" src="adminhome.jpg" alt="people holding umbrellas on a busy street at night lit by street lights and illuminated signs in Tokyo, Japan">
            </td></div><br>

        <div class="gallery-item">
            <td> <img class="gallery-image" style="width: 100%;height: 200px" src="wilton1.jpg" alt="car interior from central back seat position showing driver and blurred view through windscreen of a busy road at night">
            </td></div></tr><br>

        <div class="gallery-item">
            <td><img class="gallery-image" style="width: 100%;height: 200px" src="wilton2.jpg" alt="back view of woman wearing a backpack and beanie waiting to cross the road on a busy street at night in New York City, USA">
            </td> </div><br>

        <div class="gallery-item">
            <td><img class="gallery-image" style="width: 100%;height: 200px" src="wilton4.jpg" alt="man wearing a black jacket, white shirt, blue jeans, and brown boots, playing a white electric guitar while sitting on an amp">
            </td></div></div><br>


</table>


    </div>

</div>
<p><form action="tel:917387084384"><button type="submit" style="background-color: red;color: white">Call</button></form><br>
<p><button class="button" style="background-color: darkgreen;color: white"><a href="https://www.google.com/maps" style="color: white"> Map</a></button></p>
</body>

</html>



