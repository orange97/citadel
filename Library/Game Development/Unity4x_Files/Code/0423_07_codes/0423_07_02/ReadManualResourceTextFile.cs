// file: ReadManualResourceTextFile.cs
using UnityEngine;
using System.Collections;
using System.IO;

public class ReadManualResourceTextFile : MonoBehaviour {
	private string url;
	private string textFileContents = "(still loading file ...)";

	private void Start () {
		string fileName = "cities.txt";
		
	 	url = "file:" + Application.dataPath;
	 	url = Path.Combine(url, "Resources");
	 	url = Path.Combine(url, fileName);
		
		StartCoroutine( LoadWWW() );
	}
	
	private void OnGUI() {
		GUILayout.Label ( "url = " + url );
		GUILayout.Label ( textFileContents );
	}

	private IEnumerator LoadWWW(){
		yield return 0;
		WWW www = new WWW (url);
		yield return www;
	    textFileContents = www.text;
	}	
}
