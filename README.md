# MathPix PHP Math Question Extractor

## Introduction

This PHP script utilizes the Mathpix API to extract math questions from an image. Mathpix is an Optical Character Recognition (OCR) service designed for mathematical notation.

## Prerequisites

Before using this script, make sure you have:

- Mathpix API credentials (app_id and app_key)
- PHP installed on your system
- cURL extension enabled in PHP

## Installation

1. Clone or download the repository to your local machine.

   ```bash
   git clone https://github.com/your-username/mathpix-php-extractor.git
   ```

2. Navigate to the project directory.

   ```bash
   cd mathpix-php-extractor
   ```

3. Open `extractor.php` in a text editor and replace `your_api_id` and `your_api_key` with your Mathpix API credentials.

   ```php
   <?php
   $mathspix = 'https://i.stack.imgur.com/bRXmz.jpg';
   $curl = curl_init();

   curl_setopt_array($curl, array(
     CURLOPT_URL => 'https://api.mathpix.com/v3/text',
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => '',
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 0,
     CURLOPT_FOLLOWLOCATION => true,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => 'POST',
     CURLOPT_POSTFIELDS =>'{"src": "'.$mathspix.'", "math_inline_delimiters": ["", ""], "rm_spaces": true}',
     CURLOPT_HTTPHEADER => array(
       'app_id: your_api_id',
       'app_key: your_api_key',
       'Content-Type: application/json'
     ),
   ));

   $response = curl_exec($curl);

   curl_close($curl);

   $data=json_decode($response,true);
   $mathpixtext= $data['text'];
   echo $mathpixtext;
   ?>
   ```

## Usage

Run the script from the command line or through a web server. The script will send a request to the Mathpix API with the provided image and retrieve the extracted math question.

```bash
php extractor.php
```

## Example

### Input Image

![MathPix Example](https://i.stack.imgur.com/bRXmz.jpg)

### Output

```plaintext
Evaluate the following integrals:
(i) \int_{0}^{\pi} \frac{x \sin x}{3+\sin ^{2} x} \mathrm{~d} x;
(ii) \quad \int_{0}^{2 \pi} \frac{x \sin x}{3+\sin ^{2} x} \mathrm{~d} x;
(iii) \int_{0}^{\pi} \frac{x|\sin 2 x|}{3+\sin ^{2} x} \mathrm{~d} x.
```

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

Feel free to customize the README.md file based on your project structure, and make sure to include any additional information that might be relevant to users.
