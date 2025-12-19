public function student() {
    return $this->belongsTo(Student::class);
}

public function scholarship() {
    return $this->belongsTo(Scholarship::class);
}
