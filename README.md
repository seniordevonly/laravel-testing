## About Laravel
---



### **Agenda**
  1. The Benefits of Testing
  2. Our First Test
  3. Using Factories
  4. Using Mocking
  5. Using Database
  6. Testing JSON APIs
  7. Regression Testing
  8. Snapshot Testing
  9. Tests and CI
  10. TDD
  11. Browser Test
  12. Testing Blade Components
  13. Policy Testing
  14. Testing File Uploads
  15. Validation Rule Testing
  16. Authenticated Testing
  17. Code Coverage

---

### **1: The Benefits of Testing**
  - **Ensures Code Quality:** Detects errors and bugs early.
  - **Facilitates Refactoring:** Allows for confident changes to codebase.
  - **Prevents Regressions:** Ensures new code doesn’t break existing functionality.
  - **Improves Documentation:** Tests serve as documentation for how code should behave.
  - **Boost Developer Confidence:** Increases trust in the stability of the application.

---

### **2: Our First Test**
  - **Installation:** Laravel includes PHPUnit by default.
  - **Configuration:** Check the `phpunit.xml` file in the root directory.
  - **Example Code:**
    ```php
    public function test_example()
    {
        $this->assertTrue(true);
    }
    ```
  - **Execution:** Run `php artisan test` or `vendor/bin/phpunit`.

---

### **3: Using Factories**
  - **Purpose:** Generate fake data for models.
  - **Set Up:**
    - Define factories in `database/factories/`.
  - **Example Code:**
    ```php
    use App\Models\User;
    
    public function test_user_creation()
    {
        $user = User::factory()->make();
        $this->assertInstanceOf(User::class, $user);
    }
    ```

---

### **4: Using Mocking**
  - **Purpose:** Simulate dependencies to isolate code for testing.
  - **Mocking Example:**
    ```php
    public function test_service()
    {
        $mock = $this->createMock(MyService::class);
        $mock->method('process')->willReturn(true);
        
        $this->assertTrue($mock->process());
    }
    ```

---

### **5: Using Database**
  - **Purpose:** Use database to persist data for tests.
  - **Set Up:** Configure `phpunit.xml` for database testing.
  - **Example Code:**
    ```php
    public function test_database_interaction()
    {
        $user = User::factory()->create();
        $this->assertDatabaseHas('users', ['email' => $user->email]);
    }
    ```

---

### **6: Testing JSON APIs**
  - **Purpose:** Test API endpoints that return JSON.
  - **Example Code:**
    ```php
    public function test_api_endpoint()
    {
        $response = $this->json('GET', '/api/users');
        $response->assertStatus(200)
                 ->assertJson(['name' => 'John Doe']);
    }
    ```

---

### **7: Regression Testing**
  - **Purpose:** Ensure new code does not break existing functionality.
  - **Example Code:**
    ```php
    public function test_regressions()
    {
        $this->assertTrue(true);
    }
    ```
  - **Setup:** Run the entire test suite after changes.

---

### **8: Snapshot Testing**
  - **Purpose:** Capture and compare the output of a function/component.
  - **Example Code:**
    ```php
    public function test_html_snapshot()
    {
        $view = $this->view('welcome');
        $this->assertMatchesSnapshot($view);
    }
    ```

---

### **9: Tests and CI**
  - **Continuous Integration:** Automate testing using CI tools like GitHub Actions, Travis CI, CircleCI.
  - **Setup Example:**
    ```yaml
    name: Laravel Test

    on: [push]

    jobs:
      test:
        runs-on: ubuntu-latest
        steps:
          - uses: actions/checkout@v2
          - name: Set up PHP
            uses: shivammathur/setup-php@v2
            with:
              php-version: '8.3'
          - name: Install dependencies
            run: composer install
          - name: Run Tests
            run: php artisan test
    ```

---

### **10: TDD (Test Driven Development)**
  - **Principles:** Write tests before implementing functionality.
  - **Cycle:** Red -> Green -> Refactor.
  - **Example:**
    ```php
    public function test_addition()
    {
        $result = Calculator::add(1, 1);
        $this->assertEquals(2, $result);
    }
    ```

---

### **11: Browser Test**
  - **Laravel Dusk:** Automate browser testing.
  - **Example Code:**
    ```php
    $browser->visit('/login')
            ->type('email', 'user@example.com')
            ->type('password', 'password')
            ->press('Login')
            ->assertPathIs('/home');
    ```

---

### **12: Testing Blade Components**
  - **Purpose:** Ensure Blade components render correctly.
  - **Example Code:**
    ```php
    public function test_blade_component()
    {
        $view = $this->blade('<x-alert type="error" :message="$message"/>', ['message' => 'Test Error']);
        $view->assertSee('Test Error');
    }
    ```

---

### **13: Policy Testing**
  - **Purpose:** Ensure authorization policies work correctly.
  - **Example Code:**
    ```php
    public function test_policy()
    {
        $user = User::factory()->create();
        $ability = Gate::forUser($user)->allows('update-post', $post);
        
        $this->assertTrue($ability);
    }
    ```

---

### **14: Testing File Uploads**
  - **Purpose:** Ensure file uploading functionality works.
  - **Example Code:**
    ```php
    public function test_file_upload()
    {
        Storage::fake('images');
        
        $file = UploadedFile::fake()->image('image.jpg');
        
        $response = $this->post('/files', ['file' => $file]);
        
        Storage::disk('images')->assertExists('file.jpg');
    }
    ```

---

### **15: Validation Rule Testing**
  - **Purpose:** Test custom validation rules.
  - **Example Code:**
    ```php
    public function test_validation_rule()
    {
        $request = new Request(['email' => 'invalid-email']);
        $validator = Validator::make($request->all(), [
            'email' => 'email',
        ]);
        
        $this->assertTrue($validator->fails());
    }
    ```

---

### **16: Authenticated Testing**
  - **Purpose:** Simulate authenticated user actions.
  - **Example Code:**
    ```php
    public function test_authenticated_action()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/profile');
        
        $response->assertStatus(200);
    }
    ```

---

### **17: Code Coverage**
  - **Purpose:** Measure the percentage of code tested by unit tests.
  - **Tools:** Use Xdebug or PCOV for code coverage.
  - **Example Command:**
    ```sh
    php artisan test --coverage
    ```

---