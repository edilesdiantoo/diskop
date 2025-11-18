<?php
// Pastikan semua kode PHP diaktifkan
header('Content-Type: application/json; charset=utf-8');

$json = file_get_contents('php://input');
$data = json_decode($json, true);
file_put_contents('webhook_payload.json', $json);
$device = $data['device'];
$sender = $data['sender'];
$message = $data['message'];
$text= $data['text']; 
$member= $data['member']; 
$name = $data['name'];
$location = $data['location'];
$pollname= $data['pollname'];
$choices= $data['choices'];

// Data file (diterima dari Fonnte)
$url = $data['url'];
$filename = $data['filename'];
$extension= $data['extension'];

// Fungsi untuk mengirim pesan balasan, sekarang sudah diaktifkan
function sendFonnte($target, $data) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.fonnte.com/send",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => array(
            'target' => $target,
            'message' => $data['message'],
            'url' => $data['url'],
            'filename' => $data['filename'],
        ),
      CURLOPT_HTTPHEADER => array(
        "Authorization: WDAfMFeMTcB7xH58GQ7Z"
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

// Mulai alur logika untuk menentukan respons
// Cek apakah pesan yang masuk adalah file yang diunggah
if (!empty($url)) {
    // Tentukan folder untuk menyimpan file
    $save_path = 'uploads/'; 
    
    // Pastikan nama file unik untuk menghindari tumpang tindih
    $new_filename = 'downloaded_file_' . time() . '.' . $extension;
    $file_path_and_name = $save_path . $new_filename;

    // Unduh konten file
    $file_content = file_get_contents($url);
    
    // Simpan konten ke server
    file_put_contents($file_path_and_name, $file_content);

    // Buat respons untuk memberitahu bahwa file berhasil diunduh
    $reply = [
        "message" => "File berhasil diunduh dan disimpan di server Anda!",
    ];
    sendFonnte($sender, $reply);

} elseif ( $message == "test" || $message == "Test" ) {
    // Jika pesan adalah "test", simpan ke log
    $log_message = "Pesan masuk dari " . $sender . ": " . $message . "\\n";
    $file_handle = fopen('pesan_log.txt', 'a');
    fwrite($file_handle, $log_message);
    fclose($file_handle);
    echo "ok"; // Kirim respons kosong agar tidak ada balasan dari bot
    
} elseif ( $message == "image" ) {
    // Jika pesan adalah "image", kirim gambar balasan
    $reply = [
        "message" => "image message",
        "url" => "https://filesamples.com/samples/image/jpg/sample_640%C3%97426.jpg",
    ];
    sendFonnte($sender, $reply);
    
} elseif ( $message == "audio" ) {
    // Jika pesan adalah "audio", kirim audio balasan
    $reply = [
        "message" => "audio message",
        "url" => "https://filesamples.com/samples/audio/mp3/sample3.mp3",
        "filename" => "music",
    ];
    sendFonnte($sender, $reply);
    
} elseif ( $message == "video" ) {
    // Jika pesan adalah "video", kirim video balasan
    $reply = [
        "message" => "video message",
        "url" => "https://filesamples.com/samples/video/mp4/sample_640x360.mp4",
    ];
    sendFonnte($sender, $reply);
    
} elseif ( $message == "file" ) {
    // Jika pesan adalah "file", kirim dokumen balasan
    $reply = [
        "message" => "file message",
        "url" => "https://filesamples.com/samples/document/docx/sample3.docx",
        "filename" => "document",
    ];
    sendFonnte($sender, $reply);
    
} else {
    // Jika tidak ada kondisi yang cocok, kirim pesan default
    $reply = [
        "message" => "Sorry, i don't understand. Please use one of the following keyword:
            
Test
Audio
Video
Image
File",
    ];
    sendFonnte($sender, $reply);
}
?>