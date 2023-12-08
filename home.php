<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

include 'components/save_send.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <!-- custom css file link  -->
   
   <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
   <style>
    .image{
        flex: 1 1 50rem;
    }
    .name{
    font-size: 1.9rem;
    font-weight: 400;
    line-height: 1.78;
    color: var(--light-color);
    padding-bottom: 1rem;
   justify-content: center;
    display: flex;
    }
    .name1{
    font-size: 1.9rem;
    font-weight: 400;
    line-height: 1.78;
    text-align:justify;
    color: var(--light-color);
    padding-bottom: 1rem;
   justify-content: center;
    display: flex;
    }
    ol.breadcrumb {
  padding: 8px 16px;
  list-style: none;
  background-color: #eee;
}

ol.breadcrumb li {display: inline;font-size: 1.425rem;}

ol.breadcrumb li+li:before {
  padding: 8px;
  color: black;
  content: "/\00a0";
}
.row {
    margin: 0 auto;
    max-width: 700px;
    width: 100%;
  }
  .contact{
    justify-content: center;
  }

ol.breadcrumb li a {color: var(--main-color);}
    @media  (min-width: 600px) {
        .name p {
        font-size: 1.225rem;
        font-weight: 300;
        line-height: 1.78;
        }
}
/* CSS for responsive design */
@media only screen and (max-width: 768px) {
  .contact {
    padding: 20px;
  }

  .image {
    text-align: center;
    margin-bottom: 20px;
  }

  .name1 {
    font-size: 16px;
  }

  h2 {
    font-size: 18px;
  }

  .name {
    font-size: 14px;
  }
  .row{
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
}
/* CSS for responsive design */
@media only screen and (max-width: 375px) {
  .contact {
    padding: 20px;
  }

  .image {
    text-align: center;
    margin-bottom: 20px;
    max-width: 100%;
    height: auto;
  }

  .name1, h2, .name {
    font-size: 16px;
  }
}

   </style>
</head>
<body>
   
<?php include 'components/user_header.php'; ?>
<ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Private</a></li>
    <li><a href="#">Pictures</a></li>
    <li class="active">Vacation</li>        
  </ol>
<section class="contact" id="fly" >
<h1 class="heading">Navigating the Approval Process: How to Get Your Listing Live on SazStay</h1>
<div class="row">
<div class="image">
        <img src="images/listing.png">
      </div>
      <p class="name1">When it comes to listing your property on a real estate website like SazStay, understanding the approval process is essential. This blog post will guide you through the steps to ensure your listing meets the requirements and gets approved, maximizing its visibility to potential buyers.  </p>
      <h2>1. Create a Comprehensive Listing:</h2>
      <p class="name">To increase the chances of your listing being approved, provide accurate and detailed information about your property. Include essential details such as location, property type, size, amenities, pricing, and high-quality images. SazStay prioritizes listings that offer comprehensive information to enhance user experience.</p>
      <h2>2. Review Guidelines and Policies:</h2>
      <p class="name">Before submitting your listing, carefully read SazStay's guidelines and policies. Familiarize yourself with the dos and don'ts, image requirements, and any specific instructions. Adhering to these guidelines will streamline the approval process and help you avoid unnecessary delays or rejections.</p>
      <h2>3. Register and Verify Your Account:</h2>
      <p class="name">Create an account on SazStay and complete the verification process. This step ensures that you are a legitimate user and builds trust with potential buyers. Verification may involve confirming your email address, phone number, or providing additional identification if required.</p>
      <h2>4. Submit Your Listing:</h2>
      <p class="name">Once your account is set up and verified, proceed to submit your listing. Fill out all the required fields accurately, ensuring that your property's information is up to date. Double-check for any spelling errors or missing details that might delay the approval.</p>
      <h2>5. Await Review and Approval:</h2>
      <p class="name">After submitting your listing, it will undergo a review process by the SazStay team. This process ensures that the listing meets their quality standards and complies with their policies. The review period may vary, but it's typically a short timeframe.</p>
      <h2>6. Make Necessary Revisions (if required):</h2>
      <p class="name">If your listing requires revisions or additional information, the SazStay team will communicate with you via email or through their platform. Take prompt action on their feedback and make the necessary revisions to expedite the approval process.</p>
      <h2>7. Stay in Communication:</h2>
      <p class="name">During the review process, maintain open lines of communication with the SazStay team. Respond promptly to any inquiries or requests for clarification. Clear and effective communication will assist in resolving any issues and ensure a smooth approval process.</p>
      <h2>8. Monitor Listing Status:</h2>
      <p class="name">Check your SazStay account regularly to monitor the status of your listing. Once approved, your property will be live on the platform, visible to potential buyers. If your listing is not approved, review the reasons provided and make the necessary adjustments before resubmitting.</p>
      
    </div>
</section>
<?php include 'components/footer.php'; ?>