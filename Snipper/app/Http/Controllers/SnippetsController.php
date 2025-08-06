<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SnippetsController extends Controller
{
    private static $snippets = [
        ['id' => 1, 'language' => 'Python', 'code' => 'print("Hello, World!")'],
        ['id' => 2, 'language' => 'Python', 'code' => 'def add(a, b):\n    return a + b'],
        ['id' => 3, 'language' => 'Python', 'code' => 'class Circle:\n    def __init__(self, radius):\n        self.radius = radius\n\n    def area(self):\n        return 3.14 * self.radius ** 2'],
        ['id' => 4, 'language' => 'JavaScript', 'code' => 'console.log("Hello, World!");'],
        ['id' => 5, 'language' => 'JavaScript', 'code' => 'function multiply(a, b) {\n    return a * b;\n}'],
        ['id' => 6, 'language' => 'Javascript', 'code' => 'const square = num => num * num;'],
        ['id' => 7, 'language' => 'Java', 'code' => 'public class HelloWorld {\n    public static void main(String[] args) {\n        System.out.println(\"Hello, World!\");\n    }\n}'],
        ['id' => 8, 'language' => 'Java', 'code' => 'public class Rectangle {\n    private int width;\n    private int height;\n\n    public Rectangle(int width, int height) {\n        this.width = width;\n        this.height = height;\n    }\n\n    public int getArea() {\n        return width * height;\n    }\n}'],
    ];

    public function index()
    {
        return response()->json(self::$snippets);
    }

    public function show($id)
    {
        $index = array_search($id, array_column(self::$snippets, 'id'));
        if ($index !== false) {
            return response()->json(self::$snippets[$index]);
        }
        return response()->json(['error' => 'Item not found'], 404);
    }

    public function store(Request $request)
    {
        $item = $request->only(['language', 'code', 'type']);
        $item['id'] = count(self::$snippets) + 1;
        self::$snippets[] = $item;
        return response()->json(self::$snippets);
    }

    public function update(Request $request, $id)
    {
        $code = $request->input('code');
        $index = array_search($id, array_column(self::$snippets, 'id'));
        if ($index !== false) {
            self::$snippets[$index]['code'] = $code;
        }
        return response()->json(self::$snippets);
    }

    public function destroy($id)
    {
        $index = array_search($id, array_column(self::$snippets, 'id'));
        if ($index !== false) {
            array_splice(self::$snippets, $index, 1);
        }
        return response()->json(self::$snippets);
    }
}