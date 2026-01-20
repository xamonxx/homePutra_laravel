
import re
import os

path = r"c:\laragon\www\landingpage_homeputra\homeputra-laravel\resources\views\frontend\partials\contact.blade.php"

if not os.path.exists(path):
    print(f"File not found: {path}")
    exit(1)

with open(path, 'r', encoding='utf-8') as f:
    content = f.read()

# Debug: print the snippet around the target
idx = content.find("fetch('{{ route('")
if idx == -1:
    print("Could not find start of fetch call")
    exit(1)
print("Snippet found on disk:")
print(content[idx:idx+100])

# Regex to match the multi-line broken string
# matches: fetch('{{ route(' <newlines/spaces> api.contact.submit ') }}', {
pattern = r"fetch\('\{\{ route\('\s+api\.contact\.submit '\) \}\}', \{"

if not re.search(pattern, content):
    print("Regex did not match!")
    # Try alternate pattern just in case of spaces
    pattern = r"fetch\('\{\{ route\('[\r\n\s]+api\.contact\.submit '\) \}\}', \{"
    if not re.search(pattern, content):
        print("Alternate regex also did not match!")
        exit(1)

new_content = re.sub(pattern, "fetch('{{ route('api.contact.submit') }}', {", content)

with open(path, 'w', encoding='utf-8') as f:
    f.write(new_content)

print("File updated successfully!")
