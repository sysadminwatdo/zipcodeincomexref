# Zip code and income cross-reference

This is just something I threw together quickly because a client needed to exclude low-income zips from a PPC campaign. There aren't many free resources that offer income by zip code or public assitance percentage by zip code.

Data is from the 2000 census.

Note that the ZCTA used by the census does NOT track perfectly with zip code boundaries! It's close enough for these purposes, though.

Data accuracy is not guaranteed, and there is absolutely no warranty on this software.

Once I've got all the zips matched up to states, I'll post the data, as well.

Added export to CSV by state and county. Could add by state only if it would be useful.

Added a small bonus - I got tired of removing (and hoping I removed) my db credentials for every commit - especially while fixstate.php was running. nopw-example.sh and pw-example.sh are tiny shell scripts that go through all files with passwords and replace them with fake passwords. After the commit, run pw-example.sh and it will reverse the process.

This software is distributed under the MIT license, per the below.

The MIT License (MIT)

Copyright (c) 2016 Daniel Wurzbacher

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
