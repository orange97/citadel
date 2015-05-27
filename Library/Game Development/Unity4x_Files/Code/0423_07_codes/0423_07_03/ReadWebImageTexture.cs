// file: ReadWebImageTexture.cs
using UnityEngine;
using System.Collections;

public class ReadWebImageTexture : MonoBehaviour {
	public string url = "http://www.packtpub.com/sites/default/files/packt_logo.png";
	private Texture2D externalImage;

	private void Start () {
		StartCoroutine( LoadWWW() );
	}
	
	private void OnGUI() {
		GUILayout.Label ( "url = " + url );
		GUILayout.Label ( externalImage );
	}

	private IEnumerator LoadWWW(){
		yield return 0;
		WWW imageFile = new WWW (url);
		yield return imageFile;
	    externalImage = imageFile.texture;
	}	
}