// file: ReadWebTextFile.cs
using UnityEngine;
using System.Collections;

public class ReadWebTextFile : MonoBehaviour {
	public string url = "http://www.ascii-art.de/ascii/ab/badger.txt";
	private string textFileContents = "(still loading file ...)";

	private void Start () {
		StartCoroutine( LoadWWW() );
	}
	
	private void OnGUI() {
		GUILayout.Label ( "url = " + url );
		GUILayout.Label ( textFileContents );
	}

	private IEnumerator LoadWWW(){
		yield return 0;
		WWW textFile = new WWW (url);
		yield return textFile;
	    textFileContents = textFile.text;
	}	
}