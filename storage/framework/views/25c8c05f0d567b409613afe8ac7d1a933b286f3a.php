<?php echo '<?php' ?>

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EntrustSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        DB::beginTransaction();

        // Create table for storing roles
        Schema::create('<?php echo e($rolesTable); ?>', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating roles to users (Many-to-Many)
        Schema::create('<?php echo e($roleUserTable); ?>', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('user_id')->references('<?php echo e($userKeyName); ?>')->on('<?php echo e($usersTable); ?>')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('<?php echo e($rolesTable); ?>')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'role_id']);
        });

        // Create table for storing permissions
        Schema::create('<?php echo e($permissionsTable); ?>', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('<?php echo e($permissionRoleTable); ?>', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('permission_id')->references('id')->on('<?php echo e($permissionsTable); ?>')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('<?php echo e($rolesTable); ?>')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['permission_id', 'role_id']);
        });

        DB::commit();
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('<?php echo e($permissionRoleTable); ?>');
        Schema::drop('<?php echo e($permissionsTable); ?>');
        Schema::drop('<?php echo e($roleUserTable); ?>');
        Schema::drop('<?php echo e($rolesTable); ?>');
    }
}
<?php /**PATH /Applications/MAMP/htdocs/Es_9_23_Luglio_roles/vendor/zizaco/entrust/src/views/generators/migration.blade.php ENDPATH**/ ?>