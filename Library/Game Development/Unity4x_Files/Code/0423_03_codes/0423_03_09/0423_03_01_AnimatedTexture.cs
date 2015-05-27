using UnityEngine;
using System.Collections;

public class AnimatedTexture : MonoBehaviour 
{
	public float frameInterval = 0.9f;
	public Texture2D[] imageArray;
	private int imageIndex = 0;

	private void Awake() 
	{
		if (imageArray.Length < 1)
			Debug.LogError("no images in array!");
		else
			StartCoroutine( PlayAnimation() );		
	}

	private IEnumerator PlayAnimation()
	{
		while( true )
		{
			ChangeImage();
			yield return new WaitForSeconds(frameInterval);				
		}		
	}

	private void ChangeImage()
	{
		imageIndex++;
		imageIndex = imageIndex % imageArray.Length;
		Texture2D nextImage = imageArray[ imageIndex ];
		renderer.material.SetTexture("_MainTex", nextImage);
	}
}
