use App\Models\Produk;
use Illuminate\Support\Facades\Route;

Route::get('/sertifikat-disetujui', function () {
    // Mengambil data produk yang sudah disetujui
    $data = Produk::where('status', 'disetujui')->get();
    
    // Mengembalikan data dalam format JSON
    return response()->json([
        'status' => 'success',
        'data' => $data
    ], 200);
});