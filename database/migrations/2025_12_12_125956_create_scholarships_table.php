public function up(): void
{
    Schema::create('scholarships', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->decimal('amount', 10, 2);
        $table->timestamps();
    });
}
