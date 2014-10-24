<?php

namespace Video\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Video\CommonBundle\Entity\Video;
use Video\WebBundle\Controller\BaseController;
use Video\CommonBundle\Tools\FileUpload;
use Symfony\Component\HttpFoundation\Request;
class FileController extends BaseController
{
    public function uploadAction(Request $request)
    {
        $document=new FileUpload();
        $form=$this->createFormBuilder($document)
            ->setAction($this->generateUrl('upload'))
            ->add('file','file',array('label'=>' '))
            ->add('save','submit')
            ->getForm();
        $form->handleRequest($request);
        if($form->isValid())
        {
            $video=new Video();
            $file_name=$document->getFileName();
            $file_size=$document->getFileSize();
            $file_type=$document->getFileType();
            //$repository=$this->getDoctrine()->getRepository('VideoCommonBundle:Video');
            $em=$this->getDoctrine()->getManager();
            $query=$em->createQuery(
                'SELECT v.videoIndex 
                FROM VideoCommonBundle:Video v
                WHERE v.videoName = :filename
                ORDER BY v.videoIndex'
            )->setParameter('filename',$file_name);
            $indexes=$query->getResult();
            $len=count($indexes);
            for($i=0;$i<$len;$i++){
                if($i!= $indexes[$i]['videoIndex']){
                    $index=$i;
                    break;
                }
            }
            if($i==$len)$index=$len;
            $document->uploadFile($index);
            $upload_url=$document->getUploadUrl($index);
            $video->setVideoIndex($index);
            $video->setVideoName($file_name);
            $video->setVideoUrl($upload_url);
            //var_dump(getdate());
            $uptime=new \DateTime("now");
            //var_dump($uptime);
            $video->setVideoUptime($uptime);
            $video->setVideoSize($file_size);
            $video->setVideoType($file_type);
            $em->persist($video);
            $em->flush();
            return $this->redirect($this->generateUrl('index'));
        }
        return $this->render('VideoWebBundle:Layout:file_bar.html.twig',array(
             'upload_form'=>$form->createView()
            )); 
    
    }

    public function downloadAction()
    {
        return $this->render('VideoWebBundle:Layout:download.html.twig', array(
                // ...
            ));    }

    public function deleteAction()
    {
        return $this->render('VideoWebBundle:Layout:delete.html.twig', array(
                // ...
            ));    }

}
