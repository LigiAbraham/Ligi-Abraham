<!doctype html>
<html>
<head>
  <meta charset="utf-8<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serialized Data Repair Tool</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-4xl w-full bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Serialized Data Repair Tool</h1>

        <form method="POST" action="{{ route('repair.fix') }}" class="space-y-4">
            @csrf
            <div>
                <label for="serializedData" class="block text-sm font-medium text-gray-700">Corrupted Serialized Data:</label>
                <textarea 
                    id="serializedData" 
                    name="serializedData" 
                    rows="6" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Paste serialized data here...">{{ old('serializedData', $inputData ?? '') }}</textarea>
                @error('serializedData')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-2 px-4 rounded-md hover:bg-indigo-700">
                Fix Data
            </button>
        </form>

        @isset($repairedData)
        <div class="mt-6">
            <h2 class="text-lg font-semibold">Repaired Output:</h2>
            <div class="mt-2 bg-gray-100 p-4 rounded-md border border-gray-300">
                @if (is_string($repairedData))
                    <p>{{ $repairedData }}</p>
                @else
                    <pre class="text-sm">{{ print_r($repairedData, true) }}</pre>
                @endif
            </div>
        </div>
        @endisset
    </div>
</body>
</html>
">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
  <h1 class="text-3xl font-bold underline">
    Hello world!
  </h1>
</body>
</html>