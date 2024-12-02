use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToMetiersTable extends Migration
{
    public function up()
    {
        Schema::table('metiers', function (Blueprint $table) {
            $table->string('slug')->unique()->after('designation');
        });
    }

    public function down()
    {
        Schema::table('metiers', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
} 