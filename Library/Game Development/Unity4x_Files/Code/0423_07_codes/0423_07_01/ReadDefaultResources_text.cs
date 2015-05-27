// file: ReadDefaultResources.cs
using UnityEngine;
using System.Collections;

public class ReadDefaultResources : MonoBehaviour {
	public string fileName = "textFileName";
	private string textFileContents;

	private void Start () {
	 	TextAsset textAsset  = (TextAsset)Resources.Load(fileName);
		textFileContents = textAsset.text;
	}
	
	private void OnGUI() {
		GUILayout.Label(textFileContents);
	}
}