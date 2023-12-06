<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabla 'plan'
        Schema::create('plan', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('precio', 10, 2);
            $table->string('logo')->nullable();
            $table->string('almacenamiento');
            $table->string('ancho_de_banda');
            $table->boolean('dominio');
            $table->integer('usuarios');
            $table->boolean('soporte_por_correo');
            $table->boolean('soporte_24x7');
            // $table->timestamps();
        });

        // Tabla 'empresa'
        Schema::create('empresa', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('email', 100);
            $table->string('descripcion', 100);
            $table->string('logo')->nullable();
            $table->string('dominio')->nullable(); // Nuevo campo para el subdominio
            $table->string('stripe_key')->nullable(); // Nuevo campo para el subdominio
            $table->string('stripe_secret')->nullable(); // Nuevo campo para el subdominio
            $table->unsignedBigInteger('id_plan');
            $table->foreign('id_plan')->references('id')->on('plan');
            // $table->timestamps();
        });

        // Tabla 'historial'
        Schema::create('historial', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha');
            $table->string('descripcion', 100);
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')->references('id')->on('empresa')->onDelete('cascade');
            // $table->timestamps();
        });

        // Tabla 'queja'
        Schema::create('queja', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 100);
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')->references('id')->on('empresa')->onDelete('cascade');
            // $table->timestamps();
        });

        // Tabla 'rol'
        Schema::create('rol', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')->references('id')->on('empresa')->onDelete('cascade');
            // $table->timestamps();
        });

        // Tabla 'usuario'
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 60)->nullable();
            $table->string('email', 60)->nullable();
            $table->string('foto', 300)->nullable();
            $table->string('telefono', 30)->nullable();
            $table->string('password', 300);
            $table->string('password_token', 60)->nullable();
            $table->string('ip_add', 20)->nullable();
            $table->timestamp('password_expiracion')->nullable();
            $table->unsignedBigInteger('id_rol');
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_rol')->references('id')->on('rol')->onDelete('cascade');
            $table->foreign('id_empresa')->references('id')->on('empresa')->onDelete('cascade');
            // $table->timestamps();
        });

        // Tabla 'favorito_link'
        Schema::create('favorito_link', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_link', 200)->nullable();
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade');
            //$table->timestamps();
        });

        // Tabla 'direccion'
        Schema::create('direccion', function (Blueprint $table) {
            $table->id();
            $table->string('ciudad', 60)->nullable();
            $table->string('calle', 60)->nullable();
            $table->integer('numero');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade');
            //$table->timestamps();
        });




        // Tabla 'estado_actividad'
        Schema::create('estado_actividad', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')->references('id')->on('empresa')->onDelete('cascade');
            // $table->timestamps();
        });

        // Tabla 'grupo'
        Schema::create('grupo', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')->references('id')->on('empresa')->onDelete('cascade');
            // $table->timestamps();
        });

        // Tabla 'grupo_usuario'
        Schema::create('grupo_usuario', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_grupo');
            $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade');
            $table->foreign('id_grupo')->references('id')->on('grupo')->onDelete('cascade');
            // $table->timestamps();
        });


        // Tabla 'permiso'
        Schema::create('permiso', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 60);
            // $table->timestamps();
        });
        // Tabla 'grupo_permiso'
        Schema::create('grupo_permiso', function (Blueprint $table) {
            $table->unsignedBigInteger('id_grupo');
            $table->unsignedBigInteger('id_permiso');
            $table->primary(['id_grupo', 'id_permiso']);
            $table->foreign('id_grupo')->references('id')->on('rol')->onDelete('cascade');
            $table->foreign('id_permiso')->references('id')->on('permiso')->onDelete('cascade');
            //  $table->timestamps();
        });
        // Tabla 'lead'
        Schema::create('lead', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email');
            $table->string('telefono');
            $table->decimal('ganancia_esperada', 10, 2);
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')->references('id')->on('empresa')->onDelete('cascade');
            // $table->timestamps();
        });

        // Tabla 'actividad'
        Schema::create('actividad', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->timestamp('fecha_inicio');
            $table->timestamp('fecha_fin');
            $table->unsignedBigInteger('id_estado');
            $table->unsignedBigInteger('id_grupo');
            $table->unsignedBigInteger('id_lead');
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_estado')->references('id')->on('estado_actividad')->onDelete('cascade');
            $table->foreign('id_grupo')->references('id')->on('grupo')->onDelete('cascade');
            $table->foreign('id_lead')->references('id')->on('lead')->onDelete('cascade');
            $table->foreign('id_empresa')->references('id')->on('empresa')->onDelete('cascade');
            // $table->timestamps();
        });

        // Tabla 'tarea'
        Schema::create('tarea', function (Blueprint $table) {
            $table->id();
            $table->string('contenido');
            $table->string('finalizado');
            $table->unsignedBigInteger('id_grupo_usuario');
            $table->unsignedBigInteger('id_actividad');
            $table->foreign('id_grupo_usuario')->references('id')->on('grupo_usuario')->onDelete('cascade');
            $table->foreign('id_actividad')->references('id')->on('actividad')->onDelete('cascade');
            // $table->timestamps();
        });
        // Tabla 'sucursal'
        Schema::create('sucursal', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')->references('id')->on('empresa')->onDelete('cascade');
            // $table->timestamps();
        });

        // Tabla 'categoria'
        Schema::create('categoria', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('id_sucursal');
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_sucursal')->references('id')->on('sucursal')->onDelete('cascade');
            $table->foreign('id_empresa')->references('id')->on('empresa')->onDelete('cascade');
            //  $table->timestamps();
        });

        // Tabla 'producto'
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('imagen')->nullable();
            $table->string('descripcion');
            $table->decimal('stock', 10, 2);
            $table->decimal('costo', 10, 2);
            $table->decimal('precio', 10, 2);
            $table->unsignedBigInteger('id_categoria');
            $table->unsignedBigInteger('id_sucursal');
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_categoria')->references('id')->on('categoria')->onDelete('cascade');
            $table->foreign('id_sucursal')->references('id')->on('sucursal')->onDelete('cascade');
            $table->foreign('id_empresa')->references('id')->on('empresa')->onDelete('cascade');
            //  $table->timestamps();
        });

        // Tabla 'calificacion'
        Schema::create('calificacion', function (Blueprint $table) {
            $table->id();
            $table->string('voto');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_producto')->references('id')->on('producto')->onDelete('cascade');
            $table->foreign('id_empresa')->references('id')->on('empresa')->onDelete('cascade');
            //   $table->timestamps();
        });

        // Tabla 'comentarios'
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->string('comentario');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade');
            $table->foreign('id_producto')->references('id')->on('producto')->onDelete('cascade');
            $table->foreign('id_empresa')->references('id')->on('empresa')->onDelete('cascade');
            // $table->timestamps();
        });

        // Tabla 'presupuesto'
        Schema::create('presupuesto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('id_empresa');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_empresa')->references('id')->on('empresa')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade');
            //   $table->timestamps();
        });

        // Tabla 'detalle_presupuesto'
        Schema::create('detalle_presupuesto', function (Blueprint $table) {
            $table->id();
            $table->string('precio_parcial');
            $table->unsignedBigInteger('id_empresa');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_empresa')->references('id')->on('empresa')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade');
            $table->foreign('id_producto')->references('id')->on('producto')->onDelete('cascade');
            //  $table->timestamps();
        });


        Schema::create('estado_pedido', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
        });
        Schema::create('pedido', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha');
            $table->unsignedBigInteger('id_empresa');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_estado_pedido');
            $table->foreign('id_empresa')->references('id')->on('empresa')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade');
            $table->foreign('id_estado_pedido')->references('id')->on('estado_pedido')->onDelete('cascade');

            //  $table->timestamps();
        });
        Schema::create('detalle_pedido', function (Blueprint $table) {

            $table->unsignedInteger('cantidad');
            $table->string('precio_parcial');
            $table->unsignedBigInteger('id_pedido');
            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_pedido')->references('id')->on('pedido')->onDelete('cascade');
            $table->foreign('id_producto')->references('id')->on('producto')->onDelete('cascade');
            //  $table->timestamps();
        });
        Schema::create('reporte', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha');
            $table->unsignedInteger('nombre');
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')->references('id')->on('empresa')->onDelete('cascade');
            //  $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { //
        Schema::dropIfExists('reporte');
        Schema::dropIfExists('detalle_pedido');
        Schema::dropIfExists('pedido');
        Schema::dropIfExists('estado_pedido');
        Schema::dropIfExists('detalle_presupuesto');
        Schema::dropIfExists('presupuesto');
        Schema::dropIfExists('comentarios');
        Schema::dropIfExists('calificacion');
        Schema::dropIfExists('producto');
        Schema::dropIfExists('categoria');
        Schema::dropIfExists('sucursal');
        Schema::dropIfExists('tarea');
        Schema::dropIfExists('actividad');
        Schema::dropIfExists('lead');
        Schema::dropIfExists('grupo_permiso');
        Schema::dropIfExists('permiso');
        Schema::dropIfExists('grupo_usuario');
        Schema::dropIfExists('grupo');
        Schema::dropIfExists('estado_actividad');
        Schema::dropIfExists('direccion');
        Schema::dropIfExists('favorito_link');
        Schema::dropIfExists('usuario');
        Schema::dropIfExists('rol');
        Schema::dropIfExists('queja');
        Schema::dropIfExists('historial');
        Schema::dropIfExists('empresa');
        Schema::dropIfExists('plan');
    }
};
